<?php namespace LMJFB\Repositories;

use DB;
use LMJFB\Entities\Student;
use LMJFB\Entities\Teacher;
use LMJFB\Entities\ProfPrincipal;

abstract class DbRepository
{

   public function getcurrentAYear(){

        return  DB::table('anneescolaire')->orderBy('id', 'desc')
                 ->first();
   }

   public function getTrimestreByName($trimestre){
     $aYear = $this->getcurrentAYear();

     return DB::table('trimestres')->where('anneescolaire_id', '=',$aYear->id)
                     ->where('trimestre_description', '=', $trimestre)
                     ->first();

   }

  public function getTrimestreById($id){
     $aYear = $this->getcurrentAYear();

     return DB::table('trimestres')->where('anneescolaire_id', '=',$aYear->id)
                     ->where('id', '=', $id)
                     ->first();
   }

   /// ==== TODO : prevoir le cas des enseignants de l annee encours

   public function getEnseignants(){
      return DB::table('users')->join('course_user','course_user.user_id', '=', 'users.id')
                               ->join('courses','course_user.course_id', '=', 'courses.id')
                               ->select('users.id','users.user_name', 'users.user_contact',
                                         'users.user_last_name', 'courses.course_name'
                               )->get();

                               
   }

   public function getCourseByTeacherId($id){
      return DB::table('users')->join('course_user','course_user.user_id', '=', 'users.id')
                               ->join('courses','course_user.course_id', '=', 'courses.id')
                               ->where('course_user.user_id', $id)
                               ->select('users.id','users.user_name', 'users.user_contact',
                                         'users.user_last_name', 'courses.course_name', 'courses.id as courseid'
                               )->get();

                               
   }

   public function getTeachers(){



      $teachers = DB::table('courses')->join('teachers', 'courses.id', '='
           ,'teachers.course_id')->join('users', 'users.id', '='
           ,'teachers.user_id')->join('classrooms', 'classrooms.id', '='
           ,'teachers.classroom_id')
           ->select('users.id','users.user_name', 'users.user_contact',
           'users.user_last_name', 'courses.course_name', 'classrooms.classroom_name')
           ->distinct()->get();

           $id = [];
           $teacherCollect = collect([]);

           foreach ($teachers as $teacher) {
             if (!in_array($teacher->id, $id)) {
                array_push($id, $teacher->id);
                $teacherCollect->push([
                    'id' => $teacher->id,
                    'user_name'=> $teacher->user_name,
                    'user_contact'=> $teacher->user_contact,
                    'user_last_name'=> $teacher->user_last_name,
                    'course_name'=> $teacher->course_name,
                    'classroom_name'=> $teacher->classroom_name
                  ]);
             }
           }

          // dd($teacherCollect);
            return $teacherCollect;
   }


      public function getTeachersByClassroomAndCourses(){

        // Tous les profs de l année académiques encours

         $aYear = $this->getcurrentAYear();

         $teachers = DB::table('users')->join('course_user','course_user.user_id', '=', 'users.id')
                                    ->join('courses','course_user.course_id', '=', 'courses.id')
                                    ->join('course_childs', 'courses.id', '=' ,'course_childs.course_id')
                                    ->join('teachers', 'users.id', '=','teachers.user_id')
                                    ->join('classrooms', 'classrooms.id', '=' ,'teachers.classroom_id')
                                    ->join('enrollments', 'enrollments.classroom_id' ,'=', 'classrooms.id')
                                    ->where('enrollments.anneescolaire_id', $aYear->id)

                                    ->select(
                                              'users.id',
                                              'users.user_name',
                                              'users.user_contact',
                                              'users.user_last_name',
                                              'course_childs.label_course',
                                              'classrooms.classroom_name'
                                    )->get();

            return $teachers ;
      }

   public function getStudents(){

    $aYear = $this->getcurrentAYear();

    return DB::table('classrooms')->join('enrollments', 'enrollments.classroom_id', '=',
                'classrooms.id')->join('students', 'classrooms.id', '=','students.classroom_id')
                ->where('enrollments.anneescolaire_id', $aYear->id)
                ->select(DB::raw('count(students.id) as effectif'), 'classrooms.id as classroom_id',
                'classrooms.classroom_name')->groupBy('classrooms.id',
                'classrooms.classroom_name')->distinct()->get();
   }

   public function getAllStudents(){

    $aYear = $this->getcurrentAYear();

    return DB::table('classrooms')->join('enrollments', 'enrollments.classroom_id', '=',
                'classrooms.id')->join('students', 'classrooms.id', '=','students.classroom_id')
                ->where('enrollments.anneescolaire_id', $aYear->id)
                ->select('students.*')->distinct()->get();
   }

   public function getStudentById($id){

       return DB::table('students')->where('student_matricule', $id)->first();
   }

   public function getStudentByParents($id){

       $student = $this->getStudentById($id);

       return DB::table('parents')->join('students', 'students.parent_id',
                                   'parents.id')
                                   ->where('students.id', $student->id)
                                   ->first();
   }


   public function getStudentsByClassroom($id){

     $aYear = $this->getcurrentAYear();

      return DB::table('classrooms')->join('enrollments', 'enrollments.classroom_id', '=',
                  'classrooms.id')->join('students', 'classrooms.id', '=','students.classroom_id')
                  ->where('enrollments.anneescolaire_id', $aYear->id)
                  ->where('classrooms.id', $id)
                  ->select('students.*','classrooms.classroom_name')
                  ->distinct()->get();
   }

   public function getTeachersByCourse(){

     return DB::table('courses') ->join('teachers', 'courses.id', '='
           ,'teachers.course_id')->join('users', 'users.id', '='
           ,'teachers.user_id')->select('users.*', 'courses.course_name', 'courses.id as course')
           ->distinct()->get();
   }


   public function getTeachersByClassroom(){

        $aYear = $this->getcurrentAYear();

        return DB::table('classrooms')->join('teachers', 'classrooms.id', '='
                 ,'teachers.classroom_id')->join('enrollments', 'enrollments.classroom_id'
                 ,'=', 'classrooms.id')->where('enrollments.anneescolaire_id', $aYear->id)
                 ->select('classrooms.*')
                 ->get();
   }

   public function getTeachersClassroom($id){

        $aYear = $this->getcurrentAYear();

        return DB::table('classrooms')->join('teachers', 'classrooms.id', '='
                 ,'teachers.classroom_id')->join('enrollments', 'enrollments.classroom_id'
                 ,'=', 'classrooms.id')->where('enrollments.anneescolaire_id', $aYear->id)
                 ->where('teachers.user_id', $id)
                 ->select('classrooms.*')
                 ->get();
   }


   public function  getClassrooms(){

     $aYear = $this->getcurrentAYear();

     return DB::table('classrooms') ->join('cycles', 'cycles.id', '='
           ,'classrooms.cycle_id')->join('enrollments', 'enrollments.classroom_id'
           ,'=', 'classrooms.id')->where('enrollments.anneescolaire_id', $aYear->id)
           ->select('classrooms.*', 'enrollments.classroom_id as classroom_id', 'cycles.*')->get();
   }


   public function  getProfprincipalClassrooms($id){

     $aYear = $this->getcurrentAYear();

     return DB::table('classrooms') ->join('cycles', 'cycles.id', '='
           ,'classrooms.cycle_id')->join('enrollments', 'enrollments.classroom_id'
           ,'=', 'classrooms.id')->join('classes_pp', 'classrooms.id' ,'=', 'classes_pp.classroom_id')
            ->where('enrollments.anneescolaire_id', $aYear->id)
            ->where('classes_pp.teacher_id', $id)
            ->select('classrooms.*', 'enrollments.classroom_id', 'cycles.*')
            ->distinct()->get();
   }



   public function  getEvaluationsByTrimestres($trimestre){

     $trimestre = $this->getcurrentAYearTrimestre($trimestre) ;

     return DB::table('tests')->join('classrooms',
                'tests.classroom_id', '=', 'classrooms.id')->join('trimestres',
                'tests.trimestre_id', '=', 'trimestres.id')
                ->join('course_childs', 'course_childs.id', '=', 'tests.course_childs_id')
                ->where('trimestres.id', '=', $trimestre->id)
                ->select('tests.*','classrooms.*','tests.id','tests.max_grade_value', 'tests.trimestre_id')
                ->get();
   }


   public function getcurrentAYearTrimestre($trimestre){

    $ayear = $this->getcurrentAYear();

    return DB::table('trimestres')
           ->join('anneescolaire', 'anneescolaire.id', '=','trimestres.anneescolaire_id')
           ->where('anneescolaire.academic_year', $ayear->academic_year )
           ->where('trimestres.trimestre_description',$trimestre )
           ->select('trimestres.*')->first();

   }

   public function getcurrentAYearTrimestres(){

    $ayear = $this->getcurrentAYear();

    return DB::table('trimestres')
           ->join('anneescolaire', 'anneescolaire.id', '=','trimestres.anneescolaire_id')
           ->where('anneescolaire.academic_year', $ayear->academic_year )
           ->select('trimestres.*')->get();

   }

   public function getCourses(){
      return DB::table('courses')->get();
   }

   public function getCourseChilds(){
      return DB::table('course_childs')->get();
   }

   public function getCoursByName($course_name){
      return DB::table('courses')->join('course_childs', 'courses.id',
                      'course_childs.course_id')
                      ->where('courses.course_name', $course_name)
                      ->select('courses.*', 'course_childs.*')
                      ->get();
   }

   public function getCourseChildeById($id){
      return DB::table('course_childs')->where('course_childs.id', $id)
                      ->select('course_childs.*')
                      ->first();
   }

   public function getCourseById($id){
      return DB::table('courses')->where('courses.id', $id)
                      ->select('courses.*')
                      ->first();
   }

   public function  getClassroomByName($classroom){

     $aYear = $this->getcurrentAYear();

     return DB::table('classrooms') ->join('cycles', 'cycles.id', '='
           ,'classrooms.cycle_id')->join('enrollments', 'enrollments.classroom_id'
           ,'=', 'classrooms.id')->where('enrollments.anneescolaire_id', $aYear->id)
           ->where('classrooms.classroom_name', $classroom)
           ->select('classrooms.*', 'cycles.cycle_classe' )->first();
   }

   public function  getClassroomById($id){

     $aYear = $this->getcurrentAYear();

     return DB::table('classrooms') ->join('cycles', 'cycles.id', '='
           ,'classrooms.cycle_id')->join('enrollments', 'enrollments.classroom_id'
           ,'=', 'classrooms.id')->where('enrollments.anneescolaire_id', $aYear->id)
           ->where('classrooms.id', $id)
           ->select('classrooms.*','cycles.cycle_classe')
           ->first();
   }

   public function ispprincipal($id, $action){

      $teacher = DB::table('teachers')->where('user_id', $id) ;

      if ($action == 'add' ) {
          $teacher->update(['prof_principal' => 'Oui']);
      } else {
        $count = DB::table('classes_pp')->where('teacher_id', $id)->count();
        if (!$count) {
          $teacher->update(['prof_principal' => 'Non']);
        }
      }
   }


   public function getTestsByClassroom($testid, $classroomid, $trimestreid){

     $aYear = $this->getcurrentAYear();
  //   $students = $this->getStudentsByClassroom($classroomid);

     $courseGrades = DB::table('classrooms')->join('enrollments', 'enrollments.classroom_id', '=',
                 'classrooms.id')->join('students', 'classrooms.id', '=','students.classroom_id')
                 ->join('course_grades', 'students.id', '=', 'course_grades.student_id')
                 ->where('enrollments.anneescolaire_id', $aYear->id)
                 ->where('classrooms.id', $classroomid)
                 ->where('course_grades.test_id', $testid)
                 ->where('course_grades.trimestre_id', $trimestreid)
                 ->select('students.*','classrooms.classroom_name', 'course_grades.*')
                 ->distinct()->get();


   /// dd($courseGrades);

    return $courseGrades;

   }


   public function getCourseGradesByClassroom($classroomid, $trimestreid){


     $aYear = $this->getcurrentAYear();
     $students = $this->getStudentsByClassroom($classroomid);
     $eval = DB::table('course_grades')->where('trimestre_id', $trimestreid)
                                       ->get();

      $courseGrades = collect([]);
      foreach ($students as $student ) {
        $grade = $eval->where('student_id', $student->id);
        $courseGrades->push([
            'student_id' => $student->id,
            'student_name' => $student->student_name,
            'student_last_name' => $student->student_last_name,
            'grade' => $grade,
        ]);

      }

      return $courseGrades;

   }


   public function getCourseGradesByCourse($course, $classroomid, $trimestreid){


     $aYear = $this->getcurrentAYear();
     $students = $this->getStudentsByClassroom($classroomid);
     $eval = DB::table('course_grades')->where('trimestre_id', $trimestreid)
                                       ->get();

      $courseGrades = collect([]);
      foreach ($students as $student ) {
        $grade = $eval->where('student_id', $student->id);
        $courseGrades->push([
            'student_id' => $student->id,
            'student_name' => $student->student_name,
            'student_last_name' => $student->student_last_name,
            'grade' => $grade,
        ]);

      }

      return $courseGrades;

   }



   public function getGradesByTrimester($trimestre, $classroom){

     $trimestr = $this->getcurrentAYearTrimestre($trimestre) ;
     $class = $this->getClassroomByName($classroom) ;

     $eval =  DB::table('tests')->join('classrooms',
                'tests.classroom_id', '=', 'classrooms.id')->join('trimestres',
                'tests.trimestre_id', '=', 'trimestres.id')
                ->join('course_childs', 'course_childs.id', '=', 'tests.course_childs_id')
                ->join('courses', 'courses.id', '=', 'course_childs.course_id')
                ->where('tests.trimestre_id', '=', $trimestr->id)
                ->where('tests.classroom_id', '=', $class->id)
                ->select('tests.*','classrooms.*','tests.id','tests.max_grade_value'
                , 'tests.trimestre_id','course_childs.label_course', 'courses.course_name', 'tests.created_at')
                ->get();




      return $eval;

   }


   public function getTestCourseById($id){

      return  DB::table('tests')->join('classrooms',
                 'tests.classroom_id', '=', 'classrooms.id')
                 ->join('course_childs', 'course_childs.id', '=','tests.course_childs_id')
                 ->where('tests.id', $id)
                 ->select('classrooms.classroom_name','tests.max_grade_value',
                          'course_childs.label_course')
                 ->first();

   }






    //
    // public function getTeachers(){
    //
    // }
    // public function getStudents();
    // public function getClassrooms();
    // public function getStudentById($id);
    // public function getClassroomByName($classroom_name);
    // public function getTeacherByClassroom($classroom_name);
    // public function getStudentByClassroom($classroom_name);
}
