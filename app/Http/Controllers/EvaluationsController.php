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

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection ;
use Maatwebsite\Excel\Facades\Excel;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class EvaluationsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $DBRepository ;
    public function __construct(DbClassroomRepositories $repos)
    {
        $this->DBRepository = $repos ;
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
      $semestre = Input::get('semestre');
      $notes = Input::get('notes');

      foreach ($notes as $key => $value) {
            DB::table('courseGrade')
                      ->where('studentMatricule', $key)
                      ->where('semestreID', $semestre)
                      ->where('testID', $testid)
                      ->update(['Grade' => $value]);
      }

      return redirect('/home');
  }


  public function update_student_mark($testid, $classroomid, $trimestreid){

    dd($this->DBRepository->getTestsByClassroom($testid, $classroomid, $trimestreid));

    $aYear = $this->getAcademicYear();
    $semestre = DB::table('Semestre')->where('academicYear', '=',$aYear->academicYear)
                    ->where('semestreDescription', '=', '1er trimestre')
                    ->first();

    $eval = DB::table('courseTest')
    ->join('Classroom', 'courseTest.classRoomID','=','Classroom.classRoomID')
    ->join('courseGrade', 'courseGrade.testID', '='
    ,'courseTest.CoursetestID')
    ->join('Semestre', 'courseGrade.semestreID', '='
    ,'Semestre.semestreID')
    ->where('Classroom.classRoomID', $classroomid)
    ->where('courseTest.CoursetestID', $id)
    ->where('Semestre.semestreID', $semestre->semestreID)
    ->select('courseTest.CoursetestID', 'courseGrade.studentMatricule', 'courseGrade.Grade')
    ->get();

    $currentYearClassroom = DB::table('Classroom')
                          ->join('Student', 'Classroom.classRoomID', '='
                          ,'Student.classRoomID')
                          ->join('Enrollment', 'Enrollment.classRoomID', '=', 'Enrollment.classRoomID')
                          ->where('Enrollment.academicYear', $aYear->academicYear)
                          ->where('Classroom.classRoomID', $classroomid)
                          ->select('Student.*')
                          ->distinct()->get();

                          // dd($currentYearClassroom);

   return view('Administration.update-eval-student', [
     'testid' => $id,
     'currentYearClassroom' => $currentYearClassroom,
     'eval' => $eval,
     'semestre'=> $semestre->semestreID
   ]);


  }



  public function notesStudents(Request $request){
  //  dd(Input::file('notes'));

    Excel::load(Input::file('notes'), function($reader)
    {

      $reader->formatDates(true, 'd/m/Y');
      $reader->ignoreEmpty();
      $results = $reader->all();

      $ar = [];

      $aYear = DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                        ->select('academicYear')->first();

      foreach($results as $sheet)
      {
          $sheetname = $sheet->getTitle();
          if ($sheetname == "Fiche d'évaluation") {
            foreach ($sheet as $row) {
                $discipline = $row['discipline'];
                $classe = $row['classe'];
                $trimestreDescription = $row['trimestre'];
                $note_maximale = $row['note_maximale'];
                $id_du_prof = $row['id_du_prof'];

                $students = DB::table('Student')->where('classRoomID',
                                      $this->getclassroomByName($classe)->classRoomID)
                                    ->select('id', 'studentMatricule')->get();



                //recuperation du trimstre en fonction de l'an. scolaire
                $trimestre = DB::table('Semestre')->join('anneeScolaire',
                                       'anneeScolaire.academicYear'
                                        , '=' , 'Semestre.academicYear')
                                        ->where('semestreDescription',
                                        $trimestreDescription)->first();

            }
          } // fin de la fiche d evaluation
          else {

            $sheetname = $sheet->getTitle();

            $Test = CourseTest::create([
                'teacherID' => $id_du_prof
                ,'testName'  => $sheetname
                ,'testDescription'  => $sheetname
                ,'maxGradevalue'  => $note_maximale
                ,'CourseChildID'  => $this->getcoursechildByName($discipline)->CourseChildID
                ,'semestreID'  => $trimestre->semestreID
                ,'classRoomID' => $this->getclassroomByName($classe)->classRoomID
            ]);

            foreach ($sheet as $row) {


              if ($row['matricule'] != "") {

                 $student = DB::table('Student')->where('classRoomID',
                                      $this->getclassroomByName($classe)->classRoomID)
                                      ->where('studentMatricule', $row['matricule'])
                                      ->first();

                  $grde = [
                      'studentMatricule' => $row['matricule']
                      ,'semestreID' => $trimestre->semestreID
                      ,'TestID' => $Test->id
                      ,'Grade' => $row['note'] // note obtenu par l eleve xxx
                      ,'student_id' => $student->id
                  ];

                 $coursegrade = CourseGrade::create($grde);

              ///   $student->coursegrade()->associate($coursegrade);
                  // $ar += $grde;
                }
            } // $sheet
          }
       }
    }, 'UTF-8');

    return redirect('/home');
}


public function getAverageByCourse($classroom, $trimestre){


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


private function getclassroomByName($classroom){
  return  DB::table('Classroom')
              ->select('Classroom.classRoomID','Classroom.ClassRoomName')
              ->where('Classroom.ClassRoomName', $classroom)->first();
}

private function getcoursechildByName($discipline){
  return  DB::table('CourseChild')
              ->select('CourseChild.CourseChildID','CourseChild.courseID')
              ->where('CourseChild.labelCourse', $discipline)->first();
}

private function getcurrentAYaer(){

  return DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                            ->select('academicYear')
                            ->first();
}




}
