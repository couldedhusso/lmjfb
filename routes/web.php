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
use App\Semestre;
use App\Roles;
use App\Enseingnant;
use Maatwebsite\Excel\Facades\Excel;

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

  Route::get('ajouter-un-professeur', function () {
      $classrooms = DB::select('select * from Classroom');
      $courses = DB::select('select * from Course');

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


  Route::get('ajouter-un-eleve', function () {
      $idTeacher = Auth::user()->id;



      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();



      $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
                            ->where('semestreDescription', '=', '1er trimestre')
                            ->first();
      $classrooms = DB::select('select * from Classroom');

      return view('Admin.student-registration', compact('classrooms', 'aYear'));
      // return view('Admin.student-registration', compact('studentsCollection'));
  });

  Route::get('saisir-les-notes/{step}', 'HomeController@saisie_note');


  // mes post
  Route::post('update_teacher_data', function(){
      $id = Input::get('teacher_id');
      $user = DB::table('users')->where('id', $id);

  });

  Route::get('update_teacher_info/{id}', 'HomeController@get_teacher_by_id');
  Route::get('delete_teacher/{id}', 'HomeController@delete_teacher');
  Route::get('liste_de_classe/{id}', 'HomeController@liste_de_classe');
  Route::get('delete_classe/{id}', 'HomeController@delete_classe');
  Route::get('get_student/{classromid}/{id}', 'HomeController@get_student');
  Route::post('update_student_info', 'HomeController@update_student_info');
  Route::get('delete_student/{id}', 'HomeController@delete_student');
  Route::get('update_student_mark/{id}/{classromid}', 'HomeController@update_student_mark');
  Route::get('delete_classroom/{id}', 'HomeController@delete_classroom');


  Route::post('import-note-d-evaluations', 'EvaluationsController@notesStudents');

  Route::get('moyenne/{classromid}/{trimestre}', 'EvaluationsController@getAverageByCourse');


  Route::get('delete_Coursetest/{id}', function($id){
      $deltest = DB::table('courseTest')->where('CoursetestID', $id)->delete();
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

});

Route::get('/', function () {


      // $listes = Storage::get('/listes.xlsx');
      // $disk = Storage::disk('local');
      // dd($disk);
      // Excel::load('storage/app/listes.xlsx', function($reader) {
      //
      //     var_dump($reader);
      //
      // });

    return view('welcome');
});

Route::get('/load_classes', 'StudentController@seed_classroom');

Auth::routes();
Route::get('/home', 'HomeController@index');

///url for dummies datas

Route::get('dumiesStudents', function(){

      // it_creates_at_least_hundred_fake_users
      // $test =   DB::table('courseGrade')->where('semestreID', 1)->delete();
      // $test =   DB::table('courseTest')->where('semestreID', 1)->delete();
      // dd($test);

      $disciplines = DB::table('CourseChild')->get();
      $faker = Faker\Factory::create();

      $students = DB::table('Student')->where('classRoomID',1)->get();
      $num = $faker->randomElement([16, 27, 28]);


      foreach ($disciplines as $discipline) {

          $num = $faker->randomElement([16, 27, 28]);



          for ($i=0; $i < 2 ; $i++) {
            $Test = App\CourseTest::create([
                'teacherID' => $num
                ,'testName'  => 'evaluation'.$i
                ,'testDescription'  => 'evaluation'.$i
                ,'maxGradevalue'  => 10
                ,'CourseChildID'  => $discipline->CourseChildID
                ,'semestreID'  => 1
                ,'classRoomID' => 1
            ]);

            foreach ($students as $student) {
              $grde = [
                  'studentMatricule' => $student->studentMatricule
                  ,'semestreID' => 1
                  ,'TestID' => $Test->id
                  ,'Grade' => $faker->biasedNumberBetween($min = 0, $max = 10, $function = 'sqrt')
                  ,'student_id' => $student->id
              ];

             $coursegrade = App\CourseGrade::create($grde);
            }

          }


          for ($i=0; $i < 2 ; $i++) {
            $Test = App\CourseTest::create([
                'teacherID' => $num
                ,'testName'  => 'evaluation'.$i
                ,'testDescription'  => 'evaluation'.$i
                ,'maxGradevalue'  =>  20
                ,'CourseChildID'  => $discipline->CourseChildID
                ,'semestreID'  => 1
                ,'classRoomID' => 1
            ]);

            foreach ($students as $student) {
              $grde = [
                  'studentMatricule' => $student->studentMatricule
                  ,'semestreID' => 1
                  ,'TestID' => $Test->id
                  ,'Grade' => $faker->biasedNumberBetween($min = 0, $max = 20, $function = 'sqrt')
                  ,'student_id' => $student->id
              ];

             $coursegrade = App\CourseGrade::create($grde);
            }

          }


      }


      // //
      // $users = App\User::create([
      //        'email' => $faker->randomNumber($nbDigits = 4),
      //        'password' => bcrypt('lmjf'),
      //        'userFirstName' => $faker->firstNameMale,
      //        'userLastName' => $faker->name,
      //        'userContact' => $faker->email
      // ]);
      //
      // $Test = CourseTest::create([
      //     'teacherID' => $id_du_prof
      //     ,'testName'  => $sheetname
      //     ,'testDescription'  => $sheetname
      //     ,'maxGradevalue'  => $note_maximale
      //     ,'CourseChildID'  => $this->getcoursechildByName($discipline)->CourseChildID
      //     ,'semestreID'  => $trimestre->semestreID
      //     ,'classRoomID' => $this->getclassroomByName($classe)->classRoomID
      // ]);
      //
      // foreach ($sheet as $row) {
      //
      //
      //   if ($row['matricule'] != "") {
      //
      //      $student = DB::table('Student')->where('classRoomID',
      //                           $this->getclassroomByName($classe)->classRoomID)
      //                           ->where('studentMatricule', $row['matricule'])
      //                           ->first();
      //
      //       $grde = [
      //           'studentMatricule' => $row['matricule']
      //           ,'semestreID' => $trimestre->semestreID
      //           ,'TestID' => $Test->id
      //           ,'Grade' => $row['note'] // note obtenu par l eleve xxx
      //           ,'student_id' => $student->id
      //       ];
      //
      //      $coursegrade = CourseGrade::create($grde);



      // $users = factory(App\User::class, mt_rand(100, 1000))->create();
      // $user_count = count($users) >= 100;

    // $courses =

    // $teacher = [];
    // $faker = Faker\Factory::create();
    //
    // for ($i = 0; $i <  1; $i++) {
    //     $users = App\User::create([
    //         'email' => $faker->randomNumber($nbDigits = 4),
    //         'password' => bcrypt('lmjf'),
    //         'userFirstName' => $faker->firstNameMale,
    //         'userLastName' => $faker->name,
    //         'userContact' => $faker->email


            // $teacher[] = App\Teacher::create([
            //     'ClassRoomName' => Auth::user()->id,
            //     'CourseID' => $faker->randomDigit,
            //     'classRoomID' => $faker->randomDigit

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
