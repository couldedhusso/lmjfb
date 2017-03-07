<?php

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

use LMJFB\Repositories\DbClassroomRepositories;

use LMJFB\Entities\Enseingnant;
use LMJFB\Entities\Student;
use LMJFB\Entities\CourseTest;
use LMJFB\Entities\CourseGrade;





class UpdateDBSeeder extends Seeder
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
    }

    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      
            DB::table('tests')->truncate();
            DB::table('course_grades')->truncate();

            $inputFileName = "storage/app/1èreC1.xlsx";


        Excel::load($inputFileName, function($reader)
        {
                $matieres = [
                            'HISTOIRE-GÉOGRAPHIE' => 'HISTOIRE-GÉOGRAPHIE',
                            'ANGLAIS' => 'ANGLAIS', 
                            'MATHEMATIQUES'=> 'MATHEMATIQUES',
                            'PHYSIQUES - CHIMIE' => 'PHYSIQUE - CHIMIE', 
                            'SVT' => 'SCIENCES DE LA VIE ET DE LA TERRE',
                            'EPS' => 'EDUCATION PHYSIQUE ET SPORTIVE', 
                            'ARTS PLASTIQUE' => 'ARTS PLASTIQUES',
                            'CONDUITE' => 'CONDUITE', 
                            'PHILOSOPHIE' => 'PHILOSOPHIE', 
                            'Français' => 'FRANÇAIS'
                    ];

                $reader->formatDates(true, 'd/m/Y');
                $reader->ignoreEmpty();
                $results = $reader->all();

                // dd($results);

                $dpl = collect([]);
                
                for ($i=0; $i < count($results) ; $i++) {

                        $sheet  =  $results[$i];
                        // dd($sheet->getTitle());

                        $disciplineName = $matieres[$sheet->getTitle()];
                        $trimestreDescription = "1er trimestre";

                        //recuperation du trimestre en fonction de l'an. scolaire
                        $trimestre = $this->DBRepository->getTrimestreByName($trimestreDescription);

                        $classe_id = null;
                        $classe = null;
                        $nbreGrades = null;

                        foreach ($sheet as $row) {
                        
                            if (isset($row['grades'])){
                                $nbreGrades = intval($row['grades']);  
                                break; 
                            }                
                        }

                        $classe_id = $this->DBRepository->getclassroomByName($reader->title)->id;

                        /// TODO : trouver le moyen de recuperer la valeur maxi de la note 

                        for ($k=1; $k <= $nbreGrades ; $k++) { 
                            //  $idx = "n_".$k;
                
                            $test = CourseTest::create([
                                    'test_name'  => $disciplineName.'_test_'.bcrypt($k)
                                    ,'max_grade_value'  => '1'
                                    ,'course_childs_id'  => $this->getcoursechildByName($disciplineName)->id
                                    ,'trimestre_id'  => $trimestre->id
                                    ,'classroom_id' =>  $classe_id
                                ]);

                                // $courseGrade = CourseGrade::create($grde);

                                $setNoteMaxi = false;
                                
                                foreach ($sheet as $row) {
                                    
                                    
                                    if (isset($row['matricule'])) {

                                        $student = DB::table('students')->where('classroom_id', $classe_id)
                                                                ->where('student_matricule', $row['matricule'])
                                                                ->first();


                                            // row correspond à un enregistrement(etudiant) en particulier
                                            foreach ($row as $key => $value) {


                                                    $rgx_or = "#n".$k."20$|n".$k."10$#";
                                                    if (preg_match($rgx_or, $key)){

                                                        $grde = [
                                                            'trimestre_id' => $trimestre->id
                                                            ,'test_id' => $test->id
                                                            ,'grade' =>  $value
                                                            ,'student_id' => $student->id     
                                                            ,'appreciation' => '-'
                                                        ];

                                                        $coursegrade = CourseGrade::create($grde);

                                                        if(false == $setNoteMaxi){

                                                                // $rgx = "#n".$k."20$#";
                                                                // if (preg_match($rgx, $key)){
                                                                //         $noteMaximale = 20;    
                                                                // }else{
                                                                //         $noteMaximale = 10;
                                                                // }

                                                                $noteMaximale = substr($key, 2);

                                                                $upd = DB::table('tests')->where('id', $test->id)
                                                                            ->update(['max_grade_value' => $noteMaximale]);
                                                
                                                                $setNoteMaxi = true;
                                                            } // === end if 
                                                    }
                                                }
                                        
                                    }

                            } // === end foreach 

                            } // === end for 

                        //  dd($i);
                    }

                dd($dpl);
        });

           
    } // end run
}
