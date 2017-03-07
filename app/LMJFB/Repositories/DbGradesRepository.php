<?php namespace LMJFB\Repositories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection ;
use Maatwebsite\Excel\Facades\Excel;

use DB;
use LMJFB\Entities\Enseingnant;
use LMJFB\Entities\Student;
use LMJFB\Entities\CourseTest;
use LMJFB\Entities\CourseGrade;

/** Include PHPExcel */
use PHPOffice;
use PHPOffice\IOFactory;

//use LMJFB\Repositories\DbRepository;



class DbGradesRepository extends DbRepository
{
    public function  getAverageByCourse($classroom, $trimestre){

         $cls = $this->getClassroomById($classroom);

         $studentDbCursor = $this->getStudentsByClassroom($cls->id);

         $moyennescollect = collect([]); // matrice de moyennes

         foreach ( $studentDbCursor as  $student) {

                /// ns recuperons ttes les disciplines par classes
                ///  et par serie avec leur coefficient respectifs

                $coursechilDbCursor = $this->getCourseWithWeigth($cls->cycle_classe, $student->serie);
                                        
                $moy_par_matiere = [];

                // dd($coursechilDbCursor);

                foreach ($coursechilDbCursor as  $course) {


                        $lbl_course = $this->getCourseNameById($course->course_child_id);

                        array_push($moy_par_matiere, 
                                    [ 'discipline' => $lbl_course->label_course,
                                      'moyenne' => $this->getGradeStudentByCoursId($course, $cls, $trimestre, $student),
                                      'coefficient' => $course->coefficient
                                    ]) ;


                    } // end foreach courses


                $eleve = [
                    'matricule' => $student->student_matricule,
                    'nom' => $student->student_name,
                    'prenom' => $student->student_last_name,
                    'moyennes' => $moy_par_matiere
                ]; // moyennes d'un eleve particulier par discipline


                $moyennescollect->push($eleve);

          } // end foreach student

        return $moyennescollect ;

    } 


    public function getTestsByClassroom($classroom, $trimestre, $course_child){
         return DB::table('tests')->where('trimestre_id', $trimestre)
                            ->where('course_childs_id', $course_child)
                            ->where('classroom_id', $classroom)
                            ->select('trimestre_id', 'classroom_id', 'course_childs_id')
                            ->get();
    }


    public function getGradeByClassroom($classroom, $trimestre, $course_child){
         return DB::table('tests')->where('trimestre_id', $trimestre)
                            ->where('course_childs_id', $course_child)
                            ->where('classroom_id', $classroom)
                            ->get();
    }

                                         

    public function getCourseWithWeigth($cycle_classe, $serie){

        // $cls = $this->getClassroomByName($classroom);
        // if (Null == $serie) {
        //     $serie = '-';
        // }

        $criteria = ['cycle_classe' => $cycle_classe, 'serie' => $serie];

        return DB::table('course_coefficient')->where($criteria)
                                              ->select('course_child_id', 'coefficient')
                                              ->get();
    }


    public function getCourseNameById($cours_id){
        return DB::table('course_childs')->where('id', $cours_id)
                                        ->select('label_course')->first();
    }    


     public function getGradeStudentByCoursId($course, $cls, $trimestre, $student){


         /// TODO - refactoriser le getCourseWithWeigth et la partie en dessous($div)

            $div = DB::table('tests')->where('trimestre_id', $trimestre)->where('classroom_id', $cls->id)
                                     ->where('course_childs_id', $course->course_child_id)
                                     ->select(DB::raw('sum(poids) as weigth'))
                                      ->first();

            $sum_grade = DB::table('tests')->join('course_grades', 'tests.id', 'course_grades.test_id')
                                           ->where('course_grades.trimestre_id', $trimestre)
                                           ->where('tests.classroom_id', $cls->id)
                                           ->where('course_grades.student_id', $student->id)
                                           ->where('tests.course_childs_id', $course->course_child_id)
                                           ->select(DB::raw('sum(course_grades.grade) as som'))
                                           ->first();

         return round($sum_grade->som / $div->weigth, 2);
       
    }    
}
