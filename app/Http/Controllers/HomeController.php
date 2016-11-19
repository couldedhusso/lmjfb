<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Auth;
use DB;
use LMJFB\Entities\CourseTest;
use LMJFB\Entities\Teacher;
use LMJFB\Entities\Classes_pp;

use LMJFB\Repositories\DbClassroomRepositories;

// TODO : mettre la table à jour
class HomeController extends Controller
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
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentTrimestre = '1er trimestre';

      //  dd($this->DBRepository->getEvaluationsByTrimestres($currentTrimestre));
        return redirect('/Enseingnants');

        return view('/home', [
                     'aYear' => $this->DBRepository->getcurrentAYear()
                    ,'trimestre' => $this->DBRepository->getTrimestreByName($currentTrimestre)
                    ,'evaluations' => $this->DBRepository->getTrimestreByName($currentTrimestre)
                    ,'classrooms' => $this->DBRepository->getClassrooms()
                    ,'studentByteacher' => $this->DBRepository->getStudents()
                    ,'currentAcademiqueYearStudent' => $this->DBRepository->getAllStudents()
                    ,'allTeacher'  =>  $this->DBRepository->getTeachers()
                    ,'profdisciplines'  =>  $this->DBRepository->getTeachersByCourse()
                    ,'studentByclassroom'  =>  $this->DBRepository->getStudents()
                    ,'currentTrimesterEval' => $this->DBRepository->getEvaluationsByTrimestres($currentTrimestre)

        ]);
    }


    public function Enseingnants(){
        return view('Administration.enseignants_panel');
    }

    public function Eleves(){
        return view('Administration.eleves_panel');
    }

    public function Evaluations(){

        $classrooms = $this->DBRepository->getClassrooms();
        $trimestres = $this->DBRepository->getcurrentAYearTrimestres();

        return view('Administration.evaluations_panel', [
          'classrooms' => $classrooms,
          'trimestres' => $trimestres
        ]);
    }


    public function getEnseingnants(){
       return json_encode($this->DBRepository->getTeachers());
    }

    public function getStudentByClassroom(){

       $id  = session('classroom_id');
       return json_encode($this->DBRepository->getStudentsByClassroom($id));
    }

    public function getEleves(){
       return json_encode($this->DBRepository->getStudents());
    }

    public function getEvaluations(){
       return json_encode($this->DBRepository->getTeachers());
    }



    public function search_engine(Request $request)
    {

       $table = Input::get('search-key');
       $teacherList = $this->DBRepository->getTeachers();
       $teacherListByCourses = $this->DBRepository->getTeachersByCourse();
       $getCourses = $this->DBRepository->getCourses();
       $classroomList = $this->DBRepository->getClassrooms();
       $getAcademicYear  = $this->DBRepository->getcurrentAYear();

       $results_search = collect([]);


       // $search_key = 'wer';

       return view('Administration.search', [
           'table' => $table,
           'teacherList' => $teacherList,
           'teacherListByCourses' => $teacherListByCourses,
           'getCourses' => $getCourses,
           'classroomList' => $classroomList,
           'getAcademicYear' => $getAcademicYear,
           'results_search'=> $results_search

       ]);
    }

    public function search_results(Request $request)
    {

      // $teacherList = $this->getTeacher();
      // $teacherListByCourses = $this->getTeacherByCourses();
      // $getCourses = $this->getAllCourses();
      // $classroomList = $this->getAllClassroom();
      // $getAcademicYear  = $this->getAcademicYear();

      $teacherList = $this->DBRepository->getTeachers();
      $teacherListByCourses = $this->DBRepository->getTeachersByCourse();
      $getCourses = $this->DBRepository->getCourses();
      $classroomList = $this->DBRepository->getClassrooms();
      $getAcademicYear  = $this->DBRepository->getcurrentAYear();

       $table = Input::get('search-key');
       $qd = Input::get('search');

       // dd($qd = Input::all());

       if ($table == 'Teacher') {
         $results_search = $this->getTeacherData($qd);

       }else {
          $results_search = $this->getStudentData($qd);
       }

       return view('Administration.search', [
                              'table' => $table,
                              'teacherList' => $teacherList,
                              'teacherListByCourses' => $teacherListByCourses,
                              'getCourses' => $getCourses,
                              'classroomList' => $classroomList,
                              'getAcademicYear' => $getAcademicYear,
                              'results_search'=> $results_search ]);
    }

    private  function getTeacherData($params){

        // $teacherCollection = $this->getTeacher();
        $searchedTeacher = [];

        if ($params['search-by'] == 'nom_prenom') {

            // $xvalue = explode(" ",$params['teacher']);
            // if (count($xvalue) > 2) {
            //   $xname = "";
            //   for ($i=1; $i < count($xvalue); $i++) {
            //     $xname += $xname.' '.$xvalue[$i];
            //   }
            // }
            // dd($xvalue);
            $searchedTeacher = DB::table('courses')
                      ->join('teachers', 'courses.id', '=','teachers.course_id')
                      ->join('users', 'users.id', '=','teachers.user_id')
                      ->where('users.user_name', $xvalue[0])
                      ->where('users.user_last_name', $xvalue[1])
                      ->select('users.id','users.user_name', 'users.user_last_name',
                                'users.user_contact', 'courses.course_name')
                      ->get();
        } else {
              $searchedTeacher = DB::table('courses')
                    ->join('teachers', 'courses.id', '=','teachers.course_id')
                    ->join('users', 'users.id', '=','teachers.user_id')
                    ->where('courses.id', $params['classroom'] )
                    ->select('users.id','users.user_name', 'users.user_last_name',
                              'users.user_contact', 'courses.course_name')
                    ->distinct()->get();
        }

        return $searchedTeacher;

      }


      private  function getStudentData($params){

            // $teacherCollection = $this->getTeacher();
            $foundStudent = [];
          //  dd($params);

            if ($params['search-by'] == 'matricule') {

                $foundStudent  = DB::table('classrooms')
                                    // ->join('Enrollment', 'Classroom.classRoomID', '='
                                    //                 ,'Enrollment.classRoomID')
                                    ->join('students', 'classrooms.id', '='
                                                    ,'students.classroom_id')
                                    ->where('students.student_matricule',  $params['studentMatricule'])
                                    // ->where('Enrollment.academicYear',  $params['academicYear'])
                                    ->select('students.*', 'classrooms.classroom_name', 'classrooms.id')
                                    ->distinct()->get();
            } else {
                  $foundStudent = DB::table('classrooms')


                                      // ->join('Enrollment', 'Classroom.classRoomID', '='
                                      //                 ,'Enrollment.classRoomID')
                                      ->join('students', 'classrooms.id', '='
                                                      ,'students.classroom_id')
                                      ->where('students.classroom_id',  $params['classroom'])
                                      // ->where('Enrollment.academicYear',  $params['academicYear'])
                                      ->select('students.*', 'classrooms.classroom_name', 'classrooms.id')
                                      ->distinct()->get();
            }

        return $foundStudent;

    }

    private function getTeacher(){

        return  DB::table('Teacher')
                    // ->join('Teacher', 'Course.courseID', '='
                    // ,'Teacher.courseID')
                    ->join('users', 'users.id', '='
                    ,'Teacher.idTeacher')
                    ->select('users.*')
                    ->distinct()->get();
    }

    private function getTeacherByCourses(){
      return  DB::table('Course')
                  ->join('Teacher', 'Course.courseID', '='
                  ,'Teacher.courseID')
                  ->join('users', 'users.id', '='
                  ,'Teacher.idTeacher')
                  ->select('users.*', 'Course.courseName')
                  ->distinct()->get();
    }

    private function cleanDataQuery($user_query){
      $q = [];
      foreach ($user_query as $key => $value) {
          if (!empty($value)) $q = [$key => $value];
      }
      return $q;
    }

    private function getAllCourses(){
      return DB::table('Course')->select('Course.*')->get();
    }

    private function getAllClassroom(){
      return DB::table('Classroom')->select('Classroom.*')->get();
    }

    private function getAcademicYear(){

      return DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                     ->select('academicYear')->first();
    }

    public function delete_classroom($id){
        DB::table('students')->where('classroom_id', $id)->delete();
        return redirect()->action('HomeController@index');
    }

    public function delete_teacher($id){
        $delTeacher = DB::table('users')->where('id', $id)->delete();
        return redirect()->action('HomeController@index');
    }

    public function delete_student($id){

        $delStudent = DB::table('Student')->where('studentMatricule', $id)->delete();
        return redirect()->action('HomeController@index');
    }

    public function gradeStudent(Request $request){


      // $idTeacher = Auth::Teacher()->id;

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();

      $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
                            ->where('semestreDescription', '=', '1er trimestre')
                            ->first();

      $step = Input::get('step');
      $classSndCycle =[];
      $sndCycle = false;

      if ($step == 2) {
        $eval = Input::get('note');

        // toutes les classes de la 2nde à la Tle
        for ($i=26; $i < 40 ; $i++) {
          array_push($classSndCycle, $i);
        }

        $semestre = Input::get('semestre');
        $listTeacher = DB::table('Teacher')->join('users', 'users.id', '=', 'Teacher.idTeacher')
                  ->join('Classroom', 'Classroom.classRoomID', '=', 'Teacher.classRoomID')
                  ->select('users.*')
                  ->get();

        // si la classe selectionnee est dans cet
        // ens $classSndCycle => c est une classe du 2nd cycle
        if (!in_array($eval['classroom'], $classSndCycle)) {
            $listcourse = DB::select('select * from CourseChild');
        }else {
            $listcourse = DB::select('select * from Course');
            $sndCycle = true;
        }
        return view('Administration.saisie_notes',  [
              'step' => $step,
              'classroom' => $eval['classroom'],
              'semestre' => $eval['periode'],
              'valmaxi' => $eval['valmaxi'],
              'listTeacher' => $listTeacher,
              'listcourse' => $listcourse,
              'sndCycle' => $sndCycle
        ]);

      } else {
          $note = Input::get('note');
          $step = 3;

          $courseTest = array(
              'teacherID' => $note['prof']
              ,'testName'  => $note['testDescription']
              ,'testDescription'  => $note['testDescription']
              ,'maxGradevalue'  => $note['valmaxi']
              ,'CourseChildID'  => $note['course']
              ,'semestreID'  => $note['periode']
              ,'classRoomID' => $note['classroom']
        );

        $newTest = CourseTest::create($courseTest);

        $currentYearClassroom = DB::table('Classroom')
                              ->join('Student', 'Classroom.classRoomID', '='
                              ,'Student.classRoomID')
                              ->join('Enrollment', 'Enrollment.classRoomID', '=', 'Enrollment.classRoomID')
                              ->where('Enrollment.academicYear', $aYear->academicYear)
                              ->where('Student.classRoomID', $note['classroom'])
                              ->select('Classroom.ClassRoomName', 'Classroom.classRoomID', 'Student.*')
                              ->distinct()->get();

      //  return view('Administration.saisie_notes',  [
      //         'step' => $step,
      //         'currentYearClassroom' => $currentYearClassroom,
      //         'semestre' => $eval['periode'],
      //         'TestID'  => $newTest->TestID
      //   ]);

        return view('Profs.notes', [
               'step' => $step,
               'currentYearClassroom' => $currentYearClassroom,
               'semestre' => $note['periode'],
               'testID'  => $newTest->id,
               'classroom'  => $note['classroom']
         ]);

      }

    }

    public function saisie_note($step){

      $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                              ->select('academicYear')
                              ->first();

      $semestre = DB::table('Semestre')->where('academicYear', '=', $aYear->academicYear)
                            ->where('semestreDescription', '=', '1er trimestre')
                            ->first();

      $currentYearClassroom = DB::table('Classroom')
                            ->join('Student', 'Classroom.classRoomID', '='
                            ,'Student.classRoomID')
                            ->join('Enrollment', 'Enrollment.classRoomID', '=', 'Enrollment.classRoomID')
                            ->where('Enrollment.academicYear', $aYear->academicYear)
                            ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')->distinct()->get();

      if ($step == 1) {
         return view('Administration.saisie_notes', [
           'step' => $step,
           'currentYearClassroom' => $currentYearClassroom,
           'semestre' => $semestre
         ]);
      }elseif ($step == 2) {
        # code...
      }else {
        # code...
      }

      $listStudent = DB::table('Student')
                        ->join('Classroom', 'Classroom.classRoomID', '='
                        ,'Student.classRoomID')
                        // ->join('Enrollment', 'Classroom.classRoomID', '='
                        // ,'Enrollment.classRoomID')
                        // ->where('Enrollment.academicYear', $aYear->academicYear)
                        ->select('Student.*')->get();

      $listTeacher = DB::table('Teacher')->join('users', 'users.id', '='
                              ,'Teacher.idTeacher')->select('users.*', 'Teacher.classRoomID')
                              ->get();


      $listcourse = DB::table('Course')->join('CourseChild', 'Course.courseID', '='
                              ,'CourseChild.courseID')->select('CourseChild.*', 'Course.*')
                              ->get();


      $classroomsBy = DB::table('Classroom')
                          ->join('Student', 'Classroom.classRoomID', '='
                          ,'Student.classRoomID')
                          ->join('Teacher', 'Classroom.classRoomID', '='
                          ,'Teacher.classRoomID')
                          ->join('Course', 'Course.courseID', '='
                          ,'Teacher.courseID')
                          ->join('CourseChild', 'Course.courseID', '='
                          ,'CourseChild.courseID')
                          ->select('Student.*','CourseChild.*',
                          'Classroom.classRoomID', 'Teacher.*')
                          ->get();

      $studentByclassroom = DB::table('Classroom')
                            ->join('Student', 'Classroom.classRoomID', '='
                            ,'Student.classRoomID')
                            ->select('Student.*','Classroom.ClassRoomName', 'Classroom.classRoomID')
                            ->get();

        $keyCollection = [];
        foreach ($studentByclassroom as  $value) {
              array_push($keyCollection, $value->classRoomID);
         }

         $classrooms = DB::table('Classroom')
                       ->whereIn('Classroom.classRoomID', $keyCollection)
                       ->select('Classroom.classRoomID', 'Classroom.ClassRoomName')
                       ->get();

                            // dd($classrooms);

        return view('Administration.saisie_notes',  [
              'classrooms' => $classrooms,
              'semestre' => $semestre,
              'listStudent' => $listStudent,
              'listTeacher' => $listTeacher,
              'listcourse' => $listcourse
        ]);
    }


    public function get_teacher_by_id($id){
        // Teacher relation
          // - user -> ok
          // - profile-photo
          // - teacher -> ok
          // - classroom -> ok
          // - prof principal -> ok
          // - discipline -> ok

          // l admin doit entrer les donnees a modifier
      // $id = Input::get('teacher_id');
      // $id = Input::all();

      $user = DB::table('users')->where('id', $id)->first();

      $courses= DB::table('courses')->select('courses.id',
                                  'courses.course_name')->get();

      $teacher_courses= DB::table('courses')
                          ->join('teachers', 'courses.id', '=',
                          'teachers.course_id')
                          // ->join('CourseChild', 'Course.CourseID', '=',
                          // 'CourseChild.CourseID')
                          ->where('teachers.id', $id)
                          ->select('courses.id', 'courses.course_name')->get();


      $teacher_classroom = DB::table('classrooms')->join('teachers', 'classrooms.id'
                      ,'=', 'teachers.classroom_id')->where('teachers.user_id', $id)
                      ->select('classrooms.id','classrooms.classroom_name')
                      ->get();

      $classrooms = DB::table('classrooms')->select('classrooms.id'
                                    ,'classrooms.classroom_name')->get();



      $prof_pricinpal = DB::table('classrooms')->join('classes_pp', 'classrooms.id'
                     ,'=', 'classes_pp.classroom_id')->where('classes_pp.teacher_id', $id)
                     ->select('classrooms.id',
                     'classrooms.classroom_name',
                     'classes_pp.teacher_id')->get();


      $ppricinpal = DB::table('teachers')->where('user_id', $id)
                                ->first();

      $isProfprinc = false;
      if ($ppricinpal->prof_principal == 'Oui') {
          $isProfprinc = true;
      }


      return view('Administration.get_teacher_by_id', [
          'user' => $user
          ,'teacher_classroom' => $teacher_classroom
          ,'teacher_courses'  => $teacher_courses
          ,'courses' => $courses
          ,'classrooms' => $classrooms
          ,'prof_pricinpal' => $prof_pricinpal
          ,'isProfprinc' => $isProfprinc
      ]);

    }

    public function get_student($classroomid, $id){

        // $aYear = $this->getAcademicYear();
         $student = $this->DBRepository->getStudentById($id);

         $parent = $this->DBRepository->getStudentByParents($id);

         $classroom = $this->DBRepository->getClassrooms();

        // $student = DB::table('Student')->join('Classroom', 'Classroom.classRoomID'
        //                   ,'=', 'Student.classRoomID')
        //                   ->where('Classroom.classRoomID', $classroomid)
        //                   ->where('Student.studentMatricule', $id)
        //                   ->first();
        //
        // $parent = DB::table('Parent')->join('Student', 'Parent.parentID'
        //                   ,'=', 'Student.studentParentID')
        //                   ->where('Student.studentParentID', $student->studentParentID)
        //                   ->first();

        return view('Administration.update_student_by_id', [
            'student' => $student
            ,'classrooms' => $classroom
            ,'parent' => $parent
      ]);
    }

    public function update_student_info(Request $request){

      $student = Input::get('studentDatas');
      $parent = Input::get('studentRespoDatas');
    //  dd($student);

      $update_student_info = DB::table('students')->where('student_matricule',
                            $student['student_matricule'])->update($student);

      return redirect()->action('HomeController@index');
    }

    /**
     * cette function permet de retourner la
     * liste de classe
     * @params id de la classe
     * @return Collection
     */

    public function liste_de_classe($id){

        session()->put('classroom_id', $id);
        $classrom = DB::table('classrooms')->where('id', $id)->first();

        return view('Administration.sidebarSearch.liste_de_classe', [
            'classroom' => $classrom
        ]);

        // return view('Administration.sidebarSearch.liste_de_classe', [
        //     'studentByclassroom' => $studentByclassroom
        // ]);
    }

    public function teacherUpdate(Request $request){


      $user = Input::get('users');

      $userupdate = DB::table('users')->where('id', $user['id'])
                        ->update($user);

      $teacher = DB::table('teachers')->where('user_id', $user['id'])
                                     ->first();

      $deleteclassroom  = Input::get('deletecassroom');
      $addclassroom  = Input::get('addclassroom');
      $deleteclassroompp = Input::get('deleteclassroompp');
      $addclassroompp = Input::get('addclassroompp');
      // $classroomidpp = Input::get('classroomidpp');

      // s il y a des classes à ajouter ou à supprimer
      if (count($addclassroom) >= 1) {
        foreach ($addclassroom as $key => $value) {
           $add = Teacher::create([
             'classroom_id' => $value
            ,'user_id' => $teacher->user_id
            ,'course_id' => $teacher->course_id
          ]);
        }
      }
      elseif (count($deleteclassroom)>=1) {
          foreach ($deleteclassroom as $key => $value) {
            $delTeacherClassroom = DB::table('teachers')
                                           ->where('user_id', $teacher->user_id)
                                           ->where('classroom_id', $value)
                                           ->delete();
       }
    }

    ///$count = $this->DBRepository->ispprincipal($teacher->user_id);

    // s il y a des classes à ajouter ou à supprimer à la table prof_pricinpal
    if (count($addclassroompp) >= 1) {

        foreach ($addclassroompp as $key => $value) {
           $add = Classes_pp::create([
             'classroom_id' => $value
            ,'teacher_id' => $teacher->user_id
          ]);
        }

        $action = 'add';
        $this->DBRepository->ispprincipal($teacher->user_id, $action);

    }

    elseif (count($deleteclassroompp)>=1) {
        foreach ($deleteclassroompp as $key => $value) {
          $delPpClassroom = DB::table('classes_pp')->where('teacher_id', $user['id'])
                                         ->where('classroom_id', $value)
                                         ->delete();
     }

     $action = 'del';
     $this->DBRepository->ispprincipal($teacher->user_id, $action);
  }

    return redirect()->action('HomeController@index');

  }



    private function InitDataSession(){

     $idTeacher = Auth::user()->id;

     $aYear =  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                     ->select('academicYear')->first();

     $semestre = DB::table('Semestre')->where('academicYear', '=',$aYear->academicYear)
                     ->where('semestreDescription', '=', '1er trimestre')
                     ->first();

     $currentSemesterEval = DB::table('courseTest')->join('Classroom',
                                      'courseTest.classRoomID', '=', 'Classroom.classRoomID')
                                ->where('courseTest.semestreID', '=', $semestre->semestreID)
                                ->select('Classroom.classRoomID','Classroom.ClassRoomName'
                                                  ,'courseTest.CoursetestID','courseTest.maxGradevalue')
                                ->get();



     /* TODO : Need to remove $evaluations, $classrooms,
     *   $studentByteacher, $currentAcademiqueYearStudent
     *   because these queries are not accurate
     */
     $evaluations = DB::table('courseTest')
                         ->where('courseTest.teacherID', '=', $idTeacher)
                         ->where('courseTest.semestreID', '=', $semestre->semestreID)
                         ->get();

     $classrooms = DB::table('Classroom')
                     ->join('Teacher', 'Classroom.classRoomID', '=','Teacher.classRoomID')
                     ->where('Teacher.idTeacher', '=', $idTeacher)
                     ->select('Classroom.ClassRoomName', 'Classroom.classRoomID')
                     ->distinct()->get();

      $studentByteacher = DB::table('Classroom')
                          ->join('Teacher', 'Classroom.classRoomID', '=','Teacher.classRoomID')
                          ->join('Student', 'Classroom.classRoomID', '=','Student.classRoomID')
                          ->where('Teacher.idTeacher', '=', $idTeacher)
                          ->select('Student.*')
                          ->distinct()->get();

       $currentAcademiqueYearStudent = DB::table('Classroom')
                                 ->join('Enrollment', 'Enrollment.classRoomID', '=',
                                 'Classroom.classRoomID')
                                 ->join('Student', 'Classroom.classRoomID', '=','Student.classRoomID')
                                 ->where('Enrollment.academicYear', $aYear->academicYear)
                                 ->get();




       $allTeacher = DB::table('Course')
                            ->join('Teacher', 'Course.courseID', '='
                            ,'Teacher.courseID')
                            ->join('users', 'users.id', '='
                            ,'Teacher.idTeacher')
                            ->select('users.*', 'Course.courseName')
                            ->distinct()->get();

      $profdisciplines = DB::table('Course')
                            ->join('CourseChild', 'Course.courseID', '=','CourseChild.courseID')
                            ->join('Teacher', 'Course.courseID', '=','Teacher.courseID')
                            ->where('Teacher.idTeacher', '=', $idTeacher)
                            ->select('CourseChild.labelCourse', 'CourseChild.CourseChildID')
                            ->distinct()->get();


    $studentByclassroom = DB::table('Classroom')
                              ->join('Enrollment', 'Enrollment.classRoomID', '=',
                              'Classroom.classRoomID')
                              ->join('Student', 'Classroom.classRoomID', '=','Student.classRoomID')
                              ->where('Enrollment.academicYear', $aYear->academicYear)
                              ->select(DB::raw('count(Student.studentMatricule) as effectif'), 'Classroom.classRoomID', 'Classroom.ClassRoomName')
                              ->groupBy('Classroom.classRoomID', 'Classroom.ClassRoomName')
                              ->distinct()->get();

                              // dd($studentByclassroom);

     $db = [
            'aYear'  => $aYear
            ,'semestre'  => $semestre
            ,'evaluations'  => $evaluations
            ,'classrooms'  => $classrooms
            ,'studentByteacher'  => $studentByteacher
            ,'currentAcademiqueYearStudent'  => $currentAcademiqueYearStudent
            ,'allTeacher'  => $allTeacher
            ,'profdisciplines'  => $profdisciplines
            ,'evaluations'  => $evaluations
            ,'studentByclassroom' => $studentByclassroom
            ,'currentSemesterEval' => $currentSemesterEval
       ];

       return $db;

    }








}
