<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Semestre;
use App\Roles;
use App\Enseignant;
use Maatwebsite\Excel\Facades\Excel;
use LMJFB\Entities\Cycle;

use LMJFB\Entities\CourseCoefficient;

/** Include PHPExcel */
//use PHPOffice;
use PHPOffice\IOFactory;


Route::group(['middleware' => 'auth'], function () {

  ////=========== espace prof.

  Route::get('mes-evaluations', function () {

        $idTeacher = Auth::user()->id;

        $profdisciplines = DB::table('Course')
                            ->join('CourseChild', 'Course.courseID', '='
                            ,'CourseChild.courseID')
                            ->join('Teacher', 'Course.courseID', '='
                            ,'Teacher.courseID')
                            ->where('Teacher.idTeacher', '=', $idTeacher)
                            ->select('CourseChild.labelCourse', 'CourseChild.CourseChildID')
                            ->distinct()->get();

         $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                        ->select('academicYear')->first();


        $semestre = DB::table('Semestre')->where('academicYear', '=',$aYear->academicYear)
                        ->where('semestreDescription', '=', '1er trimestre')
                        ->first();


        $evaluations = DB::table('courseTest')
                            ->where('courseTest.teacherID', '=', $idTeacher)
                            ->where('courseTest.semestreID', '=', $semestre->semestreID)
                            ->get();

        $classrooms = DB::table('Classroom')
                        ->join('Teacher', 'Classroom.classRoomID', '='
                                ,'Teacher.classRoomID')
                        ->where('Teacher.idTeacher', '=', $idTeacher)
                        ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
                        ->distinct()->get();

        return view('Profs.evaluations', compact('profdisciplines', 'evaluations', 'classrooms', 'semestre'));
  });

  Route::get('notes-des-evalautions', function () {

      $idTeacher = Auth::user()->id;

      // $aYear = AnneeScolaire::orderBy('academicYear', 'desc')
      //                         ->select('academicYear')
      //                         ->first();

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();


      $semestre = DB::table('Semestre')->where('academicYear', '=',$aYear->academicYear)
                            ->where('semestreDescription', '=', '1er trimestre')
                            ->first();


      $evaluations = DB::table('courseTest')
                        ->where('courseTest.teacherID', '=', $idTeacher)
                        ->where('courseTest.semestreID', '=', $semestre->semestreID)
                        ->get();


      $classrooms = DB::table('Classroom')
                          ->join('Teacher', 'Classroom.classRoomID', '='
                          ,'Teacher.classRoomID')
                          ->where('Teacher.idTeacher', '=', $idTeacher)
                          ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
                          ->distinct()->get();
                          $keyCollection = [];
                          foreach ($classrooms as  $value) {
                              array_push($keyCollection, $value->classRoomID);

                          }

    // $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
    //                                               ->select('academicYear')
    //                                               ->first();
    //
    //
    //
    // $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
    //                                             ->where('semestreDescription', '=', '1er trimestre')
    //                                             ->first();

    $studentByclassroom = DB::table('Classroom')
                                                  ->join('Student', 'Classroom.classRoomID', '='
                                                  ,'Student.classRoomID')
                                                  ->whereIn('Student.classRoomID', $keyCollection)
                                                  ->select('Student.*','Classroom.ClassRoomName', 'Classroom.classRoomID')
                                                  ->get();

      // $studentByclassroom = DB::table('Classroom')
      //                       ->join('Student', 'Classroom.classRoomID', '='
      //                       ,'Student.classRoomID')
      //                       ->where('Classroom.idTeacher', '=', $idTeacher)
      //                       ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
      //                       ->get();



      return view('Profs.notes', compact('evaluations', 'classrooms', 'semestre', 'studentByclassroom'));
  });

  Route::get('saisie-des-notes', function () {

    //  $classrooms = DB::select('select * from Classroom');

      // $idTeacher = Auth::Teacher()->id;
      $idTeacher = Auth::user()->id;


      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();



      $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
                            ->where('semestreDescription', '=', '1er trimestre')
                            ->first();



      $evaluations = DB::table('courseTest')
                        ->where('courseTest.teacherID', '=', $idTeacher)
                        ->where('courseTest.semestreID', '=', $semestre->semestreID)
                        ->get();



      $classrooms = DB::table('Classroom')
                          ->join('Teacher', 'Classroom.classRoomID', '='
                          ,'Teacher.classRoomID')
                          ->where('Teacher.idTeacher', '=', $idTeacher)
                          ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
                          ->get();


      $studentByclassroom = DB::table('Classroom')
                            ->join('Student', 'Classroom.classRoomID', '='
                            ,'Student.classRoomID')
                            ->join('Teacher', 'Classroom.classRoomID', '='
                            ,'Teacher.classRoomID')
                            ->where('Teacher.idTeacher', '=', $idTeacher)
                            ->select('Student.*','Classroom.ClassRoomName', 'Classroom.classRoomID')
                            ->get();

      return view('Profs.saisie_des_notes', compact('classrooms', 'evaluations', 'studentByclassroom'));
  });

  Route::get('liste-de-presence', function () {
      $idTeacher = Auth::user()->id;

      $classrooms = DB::table('Classroom')
                          ->join('Teacher', 'Classroom.classRoomID', '='
                          ,'Teacher.classRoomID')
                          ->where('Teacher.idTeacher', '=', $idTeacher)
                          ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
                          ->get();

      $keyCollection = [];
      foreach ($classrooms as  $value) {
          array_push($keyCollection, $value->classRoomID);

      }

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();



      $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
                            ->where('semestreDescription', '=', '1er trimestre')
                            ->first();

      $studentByclassroom = DB::table('Classroom')
                              ->join('Student', 'Classroom.classRoomID', '='
                              ,'Student.classRoomID')
                              ->whereIn('Student.classRoomID', $keyCollection)
                              ->select('Student.*','Classroom.ClassRoomName', 'Classroom.classRoomID')
                              ->get();

      return view('Profs.absences',  compact('classrooms', 'studentByclassroom', 'semestre'));
  });

  ////=========== fin espace prof .


  ////=========== espace Admin.
  /// url de l espace Admin
  Route::get('gestion-des-professeurs', function () {

    $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                            ->select('academicYear')
                            ->first();

      return view('Admin.user-account',  compact('aYear'));
  });

  /// url de l espace Admin

  Route::get('Enregistrer/Enseignant', function () {


      $classrooms = DB::select('select * from classrooms');
      $courses = DB::select('select * from courses');

      return view('Admin.add-teacher', compact('classrooms', 'courses'));
  });

  Route::get('gestion-des-eleves', function () {

    $aYear = AnneeScolaire::orderBy('academicYear', 'desc')
                            ->select('academicYear')
                            ->first();


    $studentsCollection = DB::table('Student')
                                ->join('Classroom', 'Student.classRoomID', '='
                                ,'Classroom.classRoomID')
                                ->select('Student.*', 'Classroom.ClassRoomName')
                                ->get();


      return view('Admin.list-students', compact('aYear'));
      // return view('Admin.student-registration', compact('studentsCollection'));
  });


  Route::get('Enregistrer/Eleve', function () {
    //  $idTeacher = Auth::user()->id;

      $aYear =  DB::table('anneescolaire')->orderBy('academic_year', 'desc')
                              ->select('academic_year')
                              ->first();

      $classrooms = DB::select('select * from classrooms');

      return view('Admin.student-registration', compact('classrooms', 'aYear'));
      // return view('Admin.student-registration', compact('studentsCollection'));
  });

  Route::get('saisir/notes/{step}', 'HomeController@saisie_note');

  Route::get('saisir/notes', 'EvaluationsController@getStudentGrade');

  // Route::get('profs', 'HomeController@profs');


  // mes post
  Route::post('update_teacher_data', function(){
      $id = Input::get('teacher_id');
      $user = DB::table('users')->where('id', $id);

  });

  Route::get('update_teacher_info/{id}', 'HomeController@get_teacher_by_id');
  Route::get('delete_teacher/{id}', 'HomeController@delete_teacher');
  Route::get('liste/classe/{id}', 'HomeController@liste_de_classe');
  Route::get('delete_classe/{id}', 'HomeController@delete_classe');
  Route::get('get_student/{classromid}/{id}', 'HomeController@get_student');
  Route::post('update_student_info', 'HomeController@update_student_info');
  Route::get('delete_student/{id}', 'HomeController@delete_student');
  Route::get('modifier/note/evaluation/{testid}/{classromid}/{trimestre}', 'EvaluationsController@update_student_mark');
  Route::get('delete_classroom/{id}', 'HomeController@delete_classroom');

  Route::post('/api/upload/student/grades', 'EvaluationsController@notesStudents');

  Route::get('moyenne/{classromid}/{trimestre}', 'EvaluationsController@getAverageByCourse');


  Route::get('/api/delete/{id}', function($id){
      $deltest = DB::table('tests')->where('id', $id)->delete();
      return redirect()->action('HomeController@index');
  });

 // Route::get('update_teacher_info/{id}', array('as' => 'update_teacher_info',
 //            'uses' => 'HomeController@get_teacher_by_id'));

  // Route::post('delete_teacher', 'HomeController@delete_teacher');
  Route::post('update_teacher_info', 'HomeController@get_teacher_by_id');
  Route::post('get-student-by-id', 'HomeController@get_student_by_id');


  // ===== faire une recherche
  Route::post('get-search-form', 'HomeController@search_engine');
  Route::post('get-search-result', 'HomeController@search_results');

  Route::post('gradeStudent', 'HomeController@gradeStudent');
  Route::post('teacherUpdate', 'HomeController@teacherUpdate');

  Route::post('addTeacher', 'TeacherController@create');
  Route::post('studReg', 'StudentController@store');
  Route::post('newEvaluation', 'EvaluationsController@store');
  Route::post('gradeEvaluation', 'EvaluationsController@saisie_des_notes');
  Route::post('update_mark', 'EvaluationsController@update_mark');

  Route::get('/api/v1/listeProfesseur', 'TeacherController@listeProfesseur');
  Route::get('/api/v1/eleves', 'HomeController@getEleves');
  Route::get('/api/v1/classe/liste', 'HomeController@getStudentByClassroom');
  Route::get('/api/v1/Student/Liste/{id}', 'StudentController@getStudentListe');

  Route::get('/api/v1/download/grades/{test}/{classroom}/{trimester}', 'EvaluationsController@downloadGrade');


  Route::get('/api/v1/grade', 'EvaluationsController@grades');

  // Route::get('/api/v1/evaluations/{classroom}', 'EvaluationsController@getClassroomEvaluations');

  Route::post('/api/v1/evaluations', 'EvaluationsController@saisieNotes');

  Route::get('/api/v1/evaluations/{trimester}/{classroom}', 'EvaluationsController@getClassroomEvaluations');
  Route::get('/api/v1/liste/{classroom}', 'EvaluationsController@getClassroom');

  Route::post('/api/v1/post/grades', 'EvaluationsController@gradeStudent');



  // ==== menu ===============

  Route::get('/Enseignants', 'HomeController@Enseignants');
  Route::get('/Eleves', 'HomeController@Eleves');
  Route::get('/Evaluations', 'HomeController@Evaluations');

});

Route::get('/home/ListeEnseignant', 'HomeController@getEnseingnants');

Route::get('/', function () {


    return view('welcome');
});

Route::get('/load_classes', 'StudentController@seed_classroom');

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('/classroom-update', 'StudentController@classroomSeeder');

Route::get('/maths-grades', 'EvaluationsController@getStudentMathsGrade');


///url for dummies datas

// Route::get('reset-table', function(){
//     DB::table('tests')->truncate(); 
//     DB::table('course_grades')->truncate();
    
// });

Route::get('charger-les-moyennes', function(){



           //// --- TODO : MAJ des poids des differents tests

                //    $tests =  DB::table('tests')->get();
                //    foreach ($tests  as $key => $value) {

                //         if (20 == $value->max_grade_value){
                //             $val = 1;
                //         }elseif (10 == $value->max_grade_value) {
                //             $val = 0.5;
                //         }

                //         DB::table('tests')->where('id', $value->id)->update(['poids' => $val]) ;
                //    }

            //// ---


    // $C1 = [  "Expression écrite" => 1,  "Expression orale" => 1,
    //          "Orthographe" => 1, "ANGLAIS" => 1, "ALLEMAND" => 1, "ESPAGNOL" => 1,
    //          "HISTOIRE-GÉOGRAPHIE" => 1,  "MATHÉMATIQUES" => 1, 
    //          "PHYSIQUE - CHIMIE" => 1, "SCIENCES DE LA VIE ET DE LA TERRE" => 1, 
    //          "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //          "CONDUITE" => 1 ,"MUSIQUE" => 1, "Education des Droits de l\'Homme" => 1];


    //  $sdeC = [ "FRANÇAIS" => 3, "ANGLAIS" => 3, "HISTOIRE-GÉOGRAPHIE" => 2, 
    //           "MATHÉMATIQUES" => 5, "PHYSIQUE - CHIMIE" => 4, 
    //           "SCIENCES DE LA VIE ET DE LA TERRE" => 2, "ARTS PLASTIQUES" => 1, 
    //           "EDUCATION PHYSIQUE ET SPORTIVE" => 1, "CONDUITE" => 1] ;

    // // $sdeA1 = [ "FRANÇAIS" => 4, "ANGLAIS" => 3, "HISTOIRE-GÉOGRAPHIE" => 3, 
    // //           "MATHÉMATIQUES" => 3, "PHYSIQUE - CHIMIE" => 2,
    // //           "SCIENCES DE LA VIE ET DE LA TERRE" => 2, 
    // //           "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    // //           "CONDUITE" => 1 ,"MUSIQUE" => 1] ;

    // $seconde_A1 = [ "FRANÇAIS" => 4, "ANGLAIS" => 3, "HISTOIRE-GÉOGRAPHIE" => 3, 
    //           "MATHÉMATIQUES" => 3, "PHYSIQUE - CHIMIE" => 2,
    //           "SCIENCES DE LA VIE ET DE LA TERRE" => 2, 
    //           "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //           "CONDUITE" => 1] ;	


    //  $seconde_A2 = ["FRANÇAIS" => 4, "ANGLAIS" => 3, "HISTOIRE-GÉOGRAPHIE" => 3, 
    //                 "MATHÉMATIQUES" => 3, "PHYSIQUE - CHIMIE" => 2, "ALLEMAND" => 3, "ESPAGNOL" => 3,
    //                 "SCIENCES DE LA VIE ET DE LA TERRE" => 2, 
    //                 "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //                 "CONDUITE" => 1 ,"MUSIQUE" => 1] ;
	


    //  $prD = [ "FRANÇAIS" => 3, "ANGLAIS" => 2, "HISTOIRE-GÉOGRAPHIE" => 2, 
    //          "MATHÉMATIQUES" => 4, "PHYSIQUE - CHIMIE" => 4, "SCIENCES DE LA VIE ET DE LA TERRE" => 4, 
    //          "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //          "CONDUITE" => 1, "PHILOSOPHIE" => 2] ;

    //  $prC = ["FRANÇAIS" => 3, "ANGLAIS" => 2, "PHILOSOPHIE" => 2, "HISTOIRE-GÉOGRAPHIE" => 2, 
    //          "MATHÉMATIQUES" => 5,  "PHYSIQUE - CHIMIE" => 5, "SCIENCES DE LA VIE ET DE LA TERRE" => 2, 
    //          "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //          "CONDUITE" => 1] ;



    // $premiere_A1 = ["FRANÇAIS" =>4, "ANGLAIS" => 4, "PHILOSOPHIE" => 3, "HISTOIRE-GÉOGRAPHIE" => 3, 
    //          "ALLEMAND" => 3, "ESPAGNOL" => 3, "MATHÉMATIQUES" => 2, 
    //          "PHYSIQUE - CHIMIE" => 1, "SCIENCES DE LA VIE ET DE LA TERRE" => 1, 
    //          "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //          "CONDUITE" => 1, "MUSIQUE" => 1] ;

    


    //  $premiere_A2 = ["FRANÇAIS" => 4, "ANGLAIS" => 4, "PHILOSOPHIE" => 3, "HISTOIRE-GÉOGRAPHIE" => 3, 
    //          "ALLEMAND" => 1, "ESPAGNOL" => 1, "MATHÉMATIQUES" => 3, 
    //          "PHYSIQUE - CHIMIE" => 2, "SCIENCES DE LA VIE ET DE LA TERRE" => 1, 
    //          "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //          "CONDUITE" => 1,  "MUSIQUE" => 1] ;



    //  $tleA1 = ["FRANÇAIS" => 4, "ANGLAIS" => 4, "PHILOSOPHIE" => 5, "HISTOIRE-GÉOGRAPHIE" => 3, 
    //          "ALLEMAND" => 3, "ESPAGNOL" => 3, "MATHÉMATIQUES" => 2, 
    //          "SCIENCES DE LA VIE ET DE LA TERRE" => 2, 
    //          "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //          "CONDUITE" => 1,  "MUSIQUE" => 1] ;


    //  $tleA2 = ["FRANÇAIS" => 4, "ANGLAIS" => 4 , "PHILOSOPHIE" => 5 , "HISTOIRE-GÉOGRAPHIE" => 3, 
    //          "ALLEMAND" => 3, "ESPAGNOL" => 3, "MATHÉMATIQUES" => 2, 
    //          "SCIENCES DE LA VIE ET DE LA TERRE" => 2, 
    //          "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //          "CONDUITE" => 1, "MUSIQUE" => 1] ;



    //  $tleC = ["FRANÇAIS" =>3, "ANGLAIS" => 1, "PHILOSOPHIE" => 2, "HISTOIRE-GÉOGRAPHIE" => 2, 
    //           "MATHÉMATIQUES" => 5, "PHYSIQUE - CHIMIE" => 5, "SCIENCES DE LA VIE ET DE LA TERRE" => 2, 
    //          "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //          "CONDUITE" => 1,  "MUSIQUE" => 1] ;


    //  $tleD = ["FRANÇAIS" => 3, "ANGLAIS" => 1, "PHILOSOPHIE" => 2, "HISTOIRE-GÉOGRAPHIE" => 2, 
    //          "MATHÉMATIQUES" => 4, "PHYSIQUE - CHIMIE" => 4, "SCIENCES DE LA VIE ET DE LA TERRE" => 4, 
    //          "ARTS PLASTIQUES" => 1, "EDUCATION PHYSIQUE ET SPORTIVE" => 1, 
    //          "CONDUITE" => 1,  "MUSIQUE" => 1] ;



    $objPHPExc = new PHPExcel();
    $sheet = $objPHPExc->getActiveSheet();

    dd($sheet);

    

//     $inputFileName = Storage::url('app/Nattes.xlsx');

//     //$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

//     $objPHPExcel = Excel::load($inputFileName, function($reader){
//            $reader->formatDates(true, 'd/m/Y');
//            $reader->ignoreEmpty();
//            $results = $reader->all();

//            dd($results);
//     });
//     $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

//     dd($sheetData);




      // it_creates_at_least_hundred_fake_users
    //  $test =  DB::table('tests')->where('trimestre_id', 1)->delete();


    // ALTER TABLE `dblmjfb`.`teachers` 
    // CHANGE COLUMN `course_id` `course_id` INT(10) NULL ;



    //   $test =  DB::table('classrooms')->where('test_id', 80)->delete();
    //   $test =  DB::table('course_grades')->where('test_id', 63)->delete();
      //
      // dd($test);
      // $test =   DB::table('courseTest')->where('semestreID', 1)->delete();
      // dd($test);

      // $disciplines = DB::table('course_childs')->get();
      // $faker = Faker\Factory::create();
      // //
      // $students = DB::table('students')->where('classroom_id',34)->get();
      // $num = $faker->randomElement([16, 27, 28]);
      //
      //
      // foreach ($disciplines as $discipline) {
      //
      //     $num = $faker->randomElement([16, 27, 28]);
      //
      //     for ($i=0; $i < 2 ; $i++) {
      //       $Test = LMJFB\Entities\CourseTest::create([
      //           'teacher_id' => $num
      //           ,'test_name'  => 'evaluation'.$i+1
      //           ,'test_description'  => 'evaluation'.$i
      //           ,'max_grade_value'  => 10
      //           ,'course_childs_id'  => $discipline->id
      //           ,'trimestre_id'  => 1
      //           ,'classroom_id' => 34
      //       ]);
      //
      //       foreach ($students as $student) {
      //         $grde = [
      //              'trimestre_id' => 1
      //             ,'test_id' => $Test->id
      //             ,'grade' => $faker->biasedNumberBetween($min = 0, $max = 10, $function = 'sqrt')
      //             ,'student_id' => $student->id
      //             ,'appreciation' => '-'
      //         ];
      //
      //        $coursegrade = LMJFB\Entities\CourseGrade::create($grde);
      //       }
      //
      //     }
      //
      //     for ($i=0; $i < 2 ; $i++) {
      //       $Test = LMJFB\Entities\CourseTest::create([
      //           'teacher_id' => $num
      //           ,'test_name'  => 'evaluation'.$i+1
      //           ,'test_description'  => 'evaluation'.$i
      //           ,'max_grade_value'  => 20
      //           ,'course_childs_id'  => $discipline->id
      //           ,'trimestre_id'  => 1
      //           ,'classroom_id' => 34
      //       ]);
      //
      //       foreach ($students as $student) {
      //         $grde = [
      //             'trimestre_id' => 1
      //             ,'test_id' => $Test->id
      //             ,'grade' => $faker->biasedNumberBetween($min = 0, $max = 20, $function = 'sqrt')
      //             ,'student_id' => $student->id
      //             ,'appreciation' => '-'
      //         ];
      //
      //        $coursegrade = LMJFB\Entities\CourseGrade::create($grde);
      //       }
      //
      //     }
      //
      // }
    //
    //
    //   // //
    //   // $users = App\User::create([
    //   //        'email' => $faker->randomNumber($nbDigits = 4),
    //   //        'password' => bcrypt('lmjf'),
    //   //        'userFirstName' => $faker->firstNameMale,
    //   //        'userLastName' => $faker->name,
    //   //        'userContact' => $faker->email
    //   // ]);
    //   //
    //   // $Test = CourseTest::create([
    //   //     'teacherID' => $id_du_prof
    //   //     ,'testName'  => $sheetname
    //   //     ,'testDescription'  => $sheetname
    //   //     ,'maxGradevalue'  => $note_maximale
    //   //     ,'CourseChildID'  => $this->getcoursechildByName($discipline)->CourseChildID
    //   //     ,'semestreID'  => $trimestre->semestreID
    //   //     ,'classRoomID' => $this->getclassroomByName($classe)->classRoomID
    //   // ]);
    //   //
    //   // foreach ($sheet as $row) {
    //   //
    //   //
    //   //   if ($row['matricule'] != "") {
    //   //
    //   //      $student = DB::table('Student')->where('classRoomID',
    //   //                           $this->getclassroomByName($classe)->classRoomID)
    //   //                           ->where('studentMatricule', $row['matricule'])
    //   //                           ->first();
    //   //
    //   //       $grde = [
    //   //           'studentMatricule' => $row['matricule']
    //   //           ,'semestreID' => $trimestre->semestreID
    //   //           ,'TestID' => $Test->id
    //   //           ,'Grade' => $row['note'] // note obtenu par l eleve xxx
    //   //           ,'student_id' => $student->id
    //   //       ];
    //   //
    //   //      $coursegrade = CourseGrade::create($grde);
    //
    //
    //
    //   // $users = factory(App\User::class, mt_rand(100, 1000))->create();
    //   // $user_count = count($users) >= 100;
    //
    // // $courses =
    //
    // // $teacher = [];
    // $faker = Faker\Factory::create();
    //
    // for ($i = 0; $i <  4; $i++) {
    //     $users = LMJFB\Entities\User::create([
    //         'email' =>  $faker->email,
    //         'password' => bcrypt('lmjf'),
    //         'user_name' => $faker->firstNameMale,
    //         'user_last_name' => $faker->name,
    //         'user_contact' => $faker->randomNumber($nbDigits = 4)
    //         ]);
    //
    //         $teacher = LMJFB\Entities\Teacher::create([
    //             'user_id' => $users->id,
    //             'course_id' => $faker->randomDigit,
    //             'classroom_id' => $faker->randomDigit
    //         ]);
    //
    //     }

            // 'student_id', 'studentParentID', 'responsableStudent', 'contactresponsableStudent','classRoomID', 'studentName',
            // 'studentLastName','studentBirthdate', 'studentSexe', 'studentBirthPlace',
            // 'studentRegime', 'studentInterne', 'studentAffecte','studentRedoublant', 'academicYear'


            // 'student_id' => $faker->randomNumber($nbDigits = 4),
            // 'studentLastName' => $faker->firstNameFemale,
            // 'studentBirthdate' =>$faker->date($format = 'Y-m-d', $max = 'now'),
            // 'studentSexe' => 'F',
            // 'studentBirthPlace' => $faker->city,
            // 'studentRegime' => '-',
            // 'studentInterne' => '-',
            // 'studentAffecte' => 'OUI',
            // 'studentRedoublant' => '0',
            // 'classRoomID' => 25
      //   ]);
      //
      //
      //   $teacher[] = App\Teacher::create([
      //       'idTeacher' => $users->id,
      //       'ClassRoomName' => Auth::user()->id,
      //       'CourseID' => $faker->randomDigit,
      //       'classRoomID' => $faker->randomDigit
      //   ]);
      //
      // }

      // $teacher[] = App\Teacher::create([
      //     'idTeacher' => Auth::user()->id,
      //     'CourseID' => 1,
      //     'classRoomID' => 8
      // ]);


});
