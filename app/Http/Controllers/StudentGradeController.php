<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentGradeController extends Controller
{
    
// TODO : refactoriser le code ci-après

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

}
