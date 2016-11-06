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

   public function getTeachers(){

     return DB::table('courses') ->join('teachers', 'courses.id', '='
           ,'teachers.course_id')->join('users', 'users.id', '='
           ,'teachers.user_id')->select('users.*', 'courses.course_name')
           ->distinct()->get();
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
           ,'teachers.user_id')->select('users.*', 'courses.course_name')
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


   public function  getClassrooms(){

     $aYear = $this->getcurrentAYear();

     return DB::table('classrooms') ->join('cycles', 'cycles.id', '='
           ,'classrooms.cycle_id')->join('enrollments', 'enrollments.classroom_id'
           ,'=', 'classrooms.id')->where('enrollments.anneescolaire_id', $aYear->id)
           ->select('classrooms.*', 'enrollments.classroom_id', 'cycles.*')->get();


   }



   public function  getEvaluationsByTrimestres($trimestre){

     $trimestre = $this->getcurrentAYearTrimestre($trimestre) ;

     return DB::table('tests')->join('classrooms',
                'tests.classroom_id', '=', 'classrooms.id')->join('trimestres',
                'tests.trimestre_id', '=', 'trimestres.id')
                ->join('course_childs', 'course_childs.id', '=', 'tests.course_childs_id')
                ->where('trimestres.id', '=', $trimestre->id)
                ->select('tests.*','classrooms.*','tests.id','tests.max_grade_value')
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

   public function getCourses(){
      return DB::table('courses')->get();
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




  //  $profdisciplines = DB::table('courses')
  //                        ->join('course_childs', 'course.id', '=','course_childs.course_id')
  //                        ->join('teachers', 'course.id', '=','teachers.course_id')
  //                        ->where('teachers.id', '=', $idTeacher)
  //                        ->select('course_childs.labelCourse', 'course_childs.id')
  //                        ->distinct()->get();






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
