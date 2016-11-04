<?php

namespace LMJFB\Repository;

use DB;
use App\Student;
use App\Teacher;
use App\ProfPrincipal;
use LMJFB\Repository;

abstract  class DbRepository
{

  public function testFunction ()
  {
    return 'it works!';
  }

    // public function getcurrentAYaer(){
    //     return DB::table('anneeScolaire')->orderBy('academicYear', 'desc')
    //                   ->select('academicYear')->first();
    // }
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
