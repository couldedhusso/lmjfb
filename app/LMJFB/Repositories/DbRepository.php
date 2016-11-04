<?php namespace LMJFB\Repositories;

use DB;
use App\Student;
use App\Teacher;
use App\ProfPrincipal;


abstract class DbRepository
{

   public function getcurrentAYear(){

        return  DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
                 ->first();
   }

   public function getTrimestreByName($trimestre){
     $aYear = $this->getcurrentAYear();

     return DB::table('trimestre')->where('anneescolaire_id', '=',$aYear->id)
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

    return DB::table('classrooms')->join('enrollments', 'enrollments.classRoomID', '=',
                'classrooms.classRoomID')->join('student', 'classrooms.id', '=','student.classroom_id')
                ->where('enrollments.anneescolaire_id', $aYear->id)
                ->select(DB::raw('count(student.id) as effectif'), 'classrooms.id',
                'classrooms.classroom_name')->groupBy('classrooms.id',
                'classrooms.classroom_name')->distinct()->get();
   }

   public function getTeachersByCourse(){

     return DB::table('courses') ->join('teachers', 'courses.id', '='
           ,'teachers.course_id')->join('users', 'users.id', '='
           ,'teachers.user_id')->select('users.*', 'courses.course_name')
           ->distinct()->get();
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
