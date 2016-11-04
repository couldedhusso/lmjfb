<?php
 namespace LMJFB\Domain\Abstract;

 interface IClassroomRepository{
    
    public function addTeacher(array $params);
    public function addStudent(array $params);
    public function addClassroom(array $params);

    public function getTeachers();
    public function getStudents();
    public function getClassrooms();
    public function getStudentById($id);
    public function getClassroomByName($classroom_name);
    public function getTeacherByClassroom($classroom_name);
    public function getStudentByClassroom($classroom_name);

    public function deleteTeacher($id);
    public function deleteStudent($id);
    public function deleteClassroom($classroom_name);
 }
