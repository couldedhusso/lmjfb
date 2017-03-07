<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use DB;
use LMJFB\Entities\Enseingnant;
use LMJFB\Entities\Student;
use LMJFB\Entities\CourseTest;
use LMJFB\Entities\CourseGrade;

use LMJFB\Repositories\DbClassroomRepositories;
use LMJFB\Repositories\DbGradesRepository;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection ;
use Maatwebsite\Excel\Facades\Excel;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/** Include PHPExcel */
use PHPOffice;
use PHPOffice\IOFactory;

class EvaluationsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $DBRepository ;
    protected $reposMoyenne;

    public function __construct(DbClassroomRepositories $repos, DbGradesRepository $moyennes)
    {
        $this->DBRepository = $repos ;
        $this->reposMoyenne = $moyennes ;
    }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {


      $reqData = Input::except('ClassRoomID');
      $reqDataClassroom  = Input::get('ClassRoomID');

      $courseTest = array(
          'teacherID' => Auth::user()->id
          ,'testName'  => $reqData['testDescription']
          ,'testDescription'  => $reqData['testDescription']
          ,'maxGradevalue'  => $reqData['maxGradevalue']
          ,'CourseChildID'  => $reqData['CourseChildID']
          ,'semestreID'  => $reqData['semestre']
      );

      // dd($reqDataClassroom);
      // // add teacher to db
      $newTest = CoursTest::create($courseTest);

      // mettre à jour la table teacher
      foreach ($reqDataClassroom as  $value) {

        //  dd($reqDataClassroom[$key]);
          DB::table('courseTest')
              ->where('CoursetestID', $newTest->id)
              ->update(['classRoomID' => $value]);
      }

      return redirect('/home');

  }

  public function saisie_des_notes(Request $request) {


      $reqData = Input::except('_token', 'name');

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();


      $currentYearClassroom = DB::table('Classroom')
                              ->join('Student', 'Classroom.classRoomID', '='
                              ,'Student.classRoomID')
                              ->join('Enrollment', 'Enrollment.classRoomID', '=', 'Enrollment.classRoomID')
                              ->where('Enrollment.academicYear', $aYear->academicYear)
                              ->where('Student.classRoomID', $reqData['classroom'])
                              ->select('Classroom.ClassRoomName', 'Classroom.classRoomID', 'Student.*')
                              ->distinct()->get();


      for ($i=0; $i < $currentYearClassroom->count() ; $i++) {

          $studMatricule = $currentYearClassroom[$i]->studentMatricule;

          $grades[] = CourseGrade::create([
            'studentMatricule' => $studMatricule
            ,'semestreID' => $reqData['semestre']
            ,'TestID' => $reqData['testID']
            ,'Grade' => $reqData[$studMatricule] // note obtenu par l eleve xxx
            ,'Appreciation' => '-'

         ]);
      }

      //dd($grades);

      return redirect('/home');

  }


  public function update_mark(Request $request){
      $testid = Input::get('testid');
      $trimestre = Input::get('trimestre');
      $notes = Input::get('notes');

      foreach ($notes as $key => $value) {
            DB::table('course_grades')
                      ->where('student_id', $key)
                      ->where('trimestre_id', $trimestre)
                      ->where('test_id', $testid)
                      ->update(['grade' => $value]);
      }

      return redirect('/home');
  }


  public function update_student_mark($testid, $classroomid, $trimestreid){

    $aYear = $this->DBRepository->getcurrentAYear();

    session(['key-testid' => $testid, 'key-classe' => $classroomid,'key-trimestre' => $trimestreid]);

    $testcourse = $this->DBRepository->getTestCourseById($testid);

    $eval = $this->DBRepository->getTestsByClassroom($testid, $classroomid, $trimestreid);
  // dd($eval);

                          // dd($currentYearClassroom);

   return view('Administration.update-eval-student', [
     'testid' => $testid,
     'eval' => $eval,
     'classroomid' => $classroomid,
     'trimestre'=> $trimestreid,
     'testcourse'=> $testcourse
   ]);

  }

  public function grades(){

    $testid =  session('key-testid');
    $classroomid =  session('key-classe');
    $trimestreid =  session('key-trimestre');

    return json_encode($this->DBRepository->getTestsByClassroom($testid,
                                             $classroomid, $trimestreid));
  }


 //// ===== TODO : gestion des erreurs et retour de message aux users

  public function notesStudents(Request $request){
  //  dd(Input::file('notes'));

    Excel::load(Input::file('notes'), function($reader)
    {

      $reader->formatDates(true, 'd/m/Y');
      $reader->ignoreEmpty();
      $results = $reader->all();

      $ar = [];

      $aYear = $this->DBRepository->getcurrentAYear();

      foreach($results as $sheet)
      {
          $sheetname = $sheet->getTitle();
          if ($sheetname == "Fiche d'évaluation") {
            foreach ($sheet as $row) {
                $discipline = $row['discipline'];
                $classe = $row['classe'];
                $trimestreDescription = $row['trimestre'];
                $note_maximale = $row['note_maximale'];

                try{
                  $classe_id = $this->DBRepository->getclassroomByName($classe)->id;
                } catch(Exception $e){
                   dd('bug !!!');
                }



                $students = DB::table('students')->where('classroom_id', $classe_id)
                                      ->select('id', 'student_matricule')->get();


                //recuperation du trimestre en fonction de l'an. scolaire
                $trimestre = $this->DBRepository->getTrimestreByName($trimestreDescription);
          
            }
          } // fin de la fiche d evaluation
          else {

            $sheetname = $sheet->getTitle();

      
            $Test = CourseTest::create([
                'test_name'  => $sheetname
                ,'max_grade_value'  => $note_maximale
                ,'course_childs_id'  => $this->getcoursechildByName($discipline)->id
                ,'trimestre_id'  => $trimestre->id
                ,'classroom_id' => $this->DBRepository->getclassroomByName($classe)->id
            ]);

            foreach ($sheet as $row) {


              if ($row['matricule'] != "") {

                 $classe_id = $this->DBRepository->getclassroomByName($classe)->id;

                 $student = DB::table('students')->where('classroom_id', $classe_id)
                                      ->where('student_matricule', $row['matricule'])
                                      ->first();
                  $grde = [
                      'trimestre_id' => $trimestre->id
                      ,'test_id' => $Test->id
                      ,'grade' => $row['note'] // note obtenu par l eleve xxx
                      ,'student_id' => $student->id
                      ,'appreciation' => '-'
                  ];

                 $coursegrade = CourseGrade::create($grde);

              ///   $student->coursegrade()->associate($coursegrade);
                  // $ar += $grde;
                }
            } // $sheet
          }
       }
    }, 'UTF-8');

    return redirect('/Evaluations');
}



// TODO : refactoriser le code ci-après

public function getAverageByCourse($classroom, $trimestre){


  dd($this->reposMoyenne->getAverageByCourse($classroom, $trimestre));

  $studentDbCursor = Student::join('Enrollment','Enrollment.classRoomID','=',
                                    'Student.classRoomID')
                             ->where('Student.classRoomID', $classroom)
                             ->where('Enrollment.academicYear',
                             $this->getcurrentAYaer()->academicYear)->get();

  $moyennescollect = collect([]); // matrice de moyennes
  foreach ( $studentDbCursor as  $student) {

        $moyenne = [
          'matricule' => $student->studentMatricule,
          'nom' => $student->studentName,
          'prenom' => $student->studentLastName,
          'date_naiss' => $student->studentBirthdate
        ]; // moyennes d'un eleve particulier par discipline

        $coursechilDbCursor = DB::table('CourseChild')->get();

        // $excludeforlevel1 = ['Français'];
        // $excludeforlevel2 = ['Orthographe', 'Expression ecrite', 'Expression orale'];

        foreach ($coursechilDbCursor as  $courses) {
            $Tests = DB::table('courseTest')->where('semestreID', $trimestre)
                       ->where('CourseChildID', $courses->CourseChildID)
                       ->where('classRoomID', $classroom)->get();

             $diviseur = 0;
             $testId = [];
             foreach ($Tests as $value) {
                //  array_push($testId, $value->CoursetestID);
                 $testId[] += $value->CoursetestID;

                 if ($value->maxGradevalue == 20) {
                   $diviseur += 1;
                 } elseif ($value->maxGradevalue == 10) {
                   $diviseur += 0.5;
                 }
             }

             $gradeStudent = DB::table('courseGrade')->whereIn('testID', $testId)
                                          ->where('student_id', $student->id)
                                          ->where('semestreID', $trimestre)
                                          ->get();
             $avge = 0;
             foreach ($gradeStudent as $grade) {
               $avge += $grade->Grade;
             }

            // dd($avge/$diviseur);

             $moyenne += [$courses->labelCourse => ($avge/$diviseur)];

         } // end foreach courses

         $moyennescollect->push($moyenne);

  } // end foreach student

  Excel::create('calcul_de_moyennes', function($excel) use($moyennescollect) {

      // Set the title
      $excel->setTitle('moyennes');
      $excel->sheet('6ème', function($sheet) use($moyennescollect) {
      $sheet->fromArray($moyennescollect);

   });

  })->download('xlsx');

}


public function downloadGrade($testid, $classroomid, $trimestreid){

    $test = $this->DBRepository->getTestCourseById($testid);

    $collection = $this->DBRepository
                        ->getTestsByClassroom($testid, $classroomid, $trimestreid);

    $studentgrade = [];

    foreach ($collection as  $student) {
      $student = [
            'Matricule'       =>$student->student_matricule,
            'Nom et prenoms'  =>$student->student_name .' '.$student->student_last_name,
            'Note'            =>$student->grade .'/'. $test->max_grade_value,
            'Appreciation'    =>$student->appreciation,
      ];

      array_push($studentgrade, $student);
    }

    $title = "Notes d'évaluation de la" .$test->classroom_name;

    Excel::create($title, function($excel) use($studentgrade, $test) {

        $excel->setTitle('Notes');
        $excel->sheet($test->label_course, function($sheet) use($studentgrade) {
        $sheet->fromArray($studentgrade);
      });

    })->download('xlsx');
}



public function getClassroomEvaluations($trimestre, $classroom){

  return json_encode($this->DBRepository
                     ->getGradesByTrimester($trimestre, $classroom));
}

public function getClassroom($classroom){

  return json_encode($this->DBRepository
                     ->getStudentsByClassroom($classroom));
}


public function saisieNotes(Request $request){
  
    $test = Input::get('test');

    $arrMaxValue = [10, 20];

    if( !in_array($test['max_grade_value'], $arrMaxValue))
    {

        $Notice = "Veuillez choisir 10 ou 20 comme valeur maximale";
        session()->flash('Notification', $Notice);
        return redirect()->back();
    } 
     

    $course = $this->DBRepository->getCourseChildeById($test['course_childs_id']);   
    $students = $this->DBRepository->getStudentsByClassroom($test['classroom_id']);
    $classroom = $this->DBRepository->getClassroomById($test['classroom_id']);
    $trimestre = $this->DBRepository->getTrimestreById($test['trimestre_id']);

  
    $newTest = CourseTest::create([
         'test_name' => $test['test_name'],
         'course_childs_id' => $test['course_childs_id'],
         'classroom_id' => $test['classroom_id'],
         'max_grade_value'=> $test['max_grade_value'],
         'trimestre_id' => $test['trimestre_id'],
         'poids' => (20 == $test['max_grade_value']) ? 1 : 0.5
    ]);

    // dd($newTest);

    return view('Administration.saisie_notes',  [
        'newTest' => $newTest,
        'students' => $students,
        'classroom' => $classroom,
        'trimestre' => $trimestre,
        'course_childs' => $course->label_course
    ]);


}

public function gradeStudent(Request $request){
    $test= Input::get('grade');
    $grde = input::get('studentsGrade');

    foreach ($grde as $id => $grade) {

        $note= [
            'trimestre_id' => $test['trimestre_id'],
            'test_id' =>$test['test_id'],
            'student_id' => $id,
            'grade' => $grade,
            'appreciation' => '-'
         ];

        $coursegrade[] = CourseGrade::create($note);
    }

    return redirect('/Evaluations');

 }



public function getStudentGrade(request $request){

  $classrooms = $this->DBRepository->getClassrooms();
  $trimestres = $this->DBRepository->getcurrentAYearTrimestres();
  $course_childs = $this->DBRepository->getCourseChilds();

  return view('Administration.saisie_notes',  [
      'classrooms' => $classrooms,
      'trimestres' => $trimestres,
      'course_childs' => $course_childs
  ]);
}

///
/// TODO : Generer les fiches de notes au format excel par l application 
/// avec ttes les metadonnees - classe, trimestre et autres
/// 

///
/// TODO : Module de migration d'une classe ou d'eleves 
/// vers une nouvelle classe ou groupe
/// 





public function getStudentMathsGrade(request $request){

    DB::table('tests')->truncate();
    DB::table('course_grades')->truncate();

    $lmjbjExeclGrades =  new \PHPExcel();
    $inputFileName = "storage/app/1èreC1.xlsx";
    $objReader = \PHPExcel_IOFactory::createReader('Excel5');

    $objPHPExcel = Excel::load('storage/app/1èreC1.xlsx');
    // dd($lmjbjExeclGrades);


     // $lmjbjExeclGrades->properties->creator = 'LMJF de Boauke';

   //  dd($objPHPExcel);

   
 //dd($matieres['PHILOSOPHIE']);

   Excel::load($inputFileName, function($reader)
   {
           $matieres = [
                    'HISTOIRE-GÉOGRAPHIE' => 'HISTOIRE-GÉOGRAPHIE',
                    'ANGLAIS' => 'ANGLAIS', 
                    'MATHEMATIQUES'=> 'MATHEMATIQUES',
                    'PHYSIQUES - CHIMIE' => 'PHYSIQUE - CHIMIE', 
                    'SVT' => 'SCIENCES DE LA VIE ET DE LA TERRE',
                    'EPS' => 'EDUCATION PHYSIQUE ET SPORTIVE', 
                    'ARTS PLASTIQUE' => 'ARTS PLASTIQUES',
                    'CONDUITE' => 'CONDUITE', 
                    'PHILOSOPHIE' => 'PHILOSOPHIE', 
                    'Français' => 'FRANÇAIS'
            ];

           $reader->formatDates(true, 'd/m/Y');
           $reader->ignoreEmpty();
           $results = $reader->all();

           // dd($results);

           $dpl = collect([]);
           
           for ($i=0; $i < count($results) ; $i++) {

                $sheet  =  $results[$i];
                // dd($sheet->getTitle());

               // $disciplineName = $matieres[$sheet->getTitle()];
               // $trimestreDescription = "1er trimestre";

                 //recuperation du trimestre en fonction de l'an. scolaire
                $trimestre = $this->DBRepository->getTrimestreByName($trimestreDescription);

                $classe_id = null;
                $classe = null;
                $nbreGrades = null;

                foreach ($sheet as $row) {
                   
                    if (isset($row['grades'])){
                        $nbreGrades = intval($row['grades']);  
                        break; 
                    }                
                }

                $classe_id = $this->DBRepository->getclassroomByName($reader->title)->id;

              //  dd($classe_id);

                /// TODO : trouver le moyen de recuperer la valeur maxi de la note 

                for ($k=1; $k <= $nbreGrades ; $k++) { 
                      //  $idx = "n_".$k;
        
                       $test = CourseTest::create([
                            'test_name'  => $disciplineName.'_test_'.bcrypt($k)
                            ,'max_grade_value'  => '1'
                            ,'poids'  => '1'
                            ,'course_childs_id'  => $this->getcoursechildByName($disciplineName)->id
                            ,'trimestre_id'  => $trimestre->id
                            ,'classroom_id' =>  $classe_id
                        ]);

                        // $courseGrade = CourseGrade::create($grde);

                        $setNoteMaxi = false;
                        
                        foreach ($sheet as $row) {
                               
                             
                              if (isset($row['matricule'])) {

                                   $student = DB::table('students')->where('classroom_id', $classe_id)
                                                        ->where('student_matricule', $row['matricule'])
                                                        ->first();


                                    // row correspond à un enregistrement(etudiant) en particulier
                                    foreach ($row as $key => $value) {


                                            $rgx_or = "#n".$k."20$|n".$k."10$#";
                                            if (preg_match($rgx_or, $key)){

                                                $grde = [
                                                    'trimestre_id' => $trimestre->id
                                                    ,'test_id' => $test->id
                                                    ,'grade' =>  $value
                                                    ,'student_id' => $student->id     
                                                    ,'appreciation' => '-'
                                                ];

                                                $coursegrade = CourseGrade::create($grde);

                                                if(false == $setNoteMaxi){

                                                        // $rgx = "#n".$k."20$#";
                                                        // if (preg_match($rgx, $key)){
                                                        //         $noteMaximale = 20;    
                                                        // }else{
                                                        //         $noteMaximale = 10;
                                                        // }

                                                        $noteMaximale = substr($key, 2);
                                                        $poids = 0.5;

                                                        if (20 == $noteMaximale) $poids = 1;

                                                        $upd = DB::table('tests')->where('id', $test->id)
                                                                    ->update(['max_grade_value' => $noteMaximale, 'poids' => $poids ]);
                                        
                                                        $setNoteMaxi = true;
                                                    } // === end if 
                                            }
                                        }
                                   
                            }

                      } // === end foreach 

                    } // === end for 

                  //  dd($i);
             }

         dd($dpl);
   });

   

}


/// ========================================================================

private function getclassroomByName($classroom){
  return  DB::table('classrooms')
              ->select('classrooms.id','classrooms.classroom_name')
              ->where('Classroom.classroom_name', $classroom)->first();
}

private function getcoursechildByName($discipline){
  return  DB::table('course_childs')
              ->select('course_childs.id','course_childs.course_id')
              ->where('course_childs.label_course', $discipline)->first();
}

private function getcurrentAYaer(){

  return DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                            ->select('academicYear')
                            ->first();
}


}
