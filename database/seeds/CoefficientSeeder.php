<?php

use Illuminate\Database\Seeder;
use LMJFB\Entities\CourseCoefficient;

class CoefficientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


         $C1 = ["2" => 1,  "3" => 1,
             "4" => 1, "5" => 1, "7" => 1, "8" => 1,
             "6" => 1,  "10" => 1, 
             "11" => 1, "12" => 1, 
             "17" => 1, "13" => 1, 
             "15" => 1 ,"14" => 1, "16" => 1];


         $sdeC = [ "1" => 3, "5" => 3, "6" => 2, 
              "10" => 5, "11" => 4, 
              "12" => 2, "17" => 1, 
              "13" => 1, "15" => 1] ;

          $seconde_A1 = [ "1" => 4, "5" => 3, "6" => 3, 
                    "10" => 3, "11" => 2,
                    "12" => 2, 
                    "17" => 1, "13" => 1, 
                    "15" => 1] ;	


          $seconde_A2 = ["1" => 4, "5" => 3, "6" => 3, 
                          "10" => 3, "11" => 2, "7" => 3, "8" => 3,
                          "12" => 2, 
                          "17" => 1, "13" => 1, 
                          "15" => 1 ,"14" => 1] ;
        


          $prD = [ "1" => 3, "5" => 2, "6" => 2, 
                  "10" => 4, "11" => 4, "12" => 4, 
                  "17" => 1, "13" => 1, 
                  "15" => 1, "9" => 2] ;

          $prC = ["1" => 3, "5" => 2, "9" => 2, "6" => 2, 
                  "10" => 5,  "11" => 5, "12" => 2, 
                  "17" => 1, "13" => 1, 
                  "15" => 1] ;



          $premiere_A1 = ["1" =>4, "5" => 4, "9" => 3, "6" => 3, 
                  "7" => 3, "8" => 3, "10" => 2, 
                  "11" => 1, "12" => 1, 
                  "17" => 1, "13" => 1, 
                  "15" => 1, "14" => 1] ;

        

          $premiere_A2 = ["1" => 4, "5" => 4, "9" => 3, "6" => 3, 
                  "7" => 1, "8" => 1, "10" => 3, 
                  "11" => 2, "12" => 1, 
                  "17" => 1, "13" => 1, 
                  "15" => 1,  "14" => 1] ;


          $tleA1 = ["1" => 4, "5" => 4, "9" => 5, "6" => 3, 
                  "7" => 3, "8" => 3, "10" => 2, 
                  "12" => 2, 
                  "17" => 1, "13" => 1, 
                  "15" => 1,  "14" => 1] ;


          $tleA2 = ["1" => 4, "5" => 4 , "9" => 5 , "6" => 3, 
                  "7" => 3, "8" => 3, "10" => 2, 
                  "12" => 2, 
                  "17" => 1, "13" => 1, 
                  "15" => 1, "14" => 1] ;



          $tleC = ["1" =>3, "5" => 1, "9" => 2, "6" => 2, 
                    "10" => 5, "11" => 5, "12" => 2, 
                  "17" => 1, "13" => 1, 
                  "15" => 1,  "14" => 1] ;


          $tleD = ["1" => 3, "5" => 1, "9" => 2, "6" => 2, 
                  "10" => 4, "11" => 4, "12" => 4, 
                  "17" => 1, "13" => 1, 
                  "15" => 1,  "14" => 1] ;


          $classes_cycle_1 = [
              "6ème" => $C1, "5ème" => $C1, "4ème" => $C1, "3ème" => $C1,
          ]; 


          foreach ($classes_cycle_1  as $cls => $coeff) {
             foreach ($coeff as $key => $value) {
                 CourseCoefficient::create([
                    'cycle_classe' => $cls,
                    'course_child_id' => $key,
                    'serie' => '-',
                    'coefficient' => $value
                 ]);
             }
          }


          $classes_cycle_2 = [
              "sda1"  => ['cycle_classe'  => '2ndeA', 'serie' => 'A1', 'coef_courses' => $seconde_A1],
              "sda2"  => ['cycle_classe'  => '2ndeA', 'serie' => 'A2', 'coef_courses' => $seconde_A2],
              "sdc"   => ['cycle_classe'  => '2ndeC', 'serie' => 'C', 'coef_courses'  => $sdeC],
              "prea1" => ['cycle_classe'  => '1èreA', 'serie' => 'A1', 'coef_courses' => $premiere_A1],
              "prea2" => ['cycle_classe'  => '1èreA', 'serie' => 'A2', 'coef_courses' => $premiere_A2],
              "prec"  => ['cycle_classe'  => '1èreC', 'serie' => 'C', 'coef_courses'  => $prC],
              "pred"  => ['cycle_classe'  => '1èreD', 'serie' => 'D', 'coef_courses'  => $prD],
              "tlea1" => ['cycle_classe'  => 'TleA', 'serie'  => 'A1', 'coef_courses' => $tleA1],
              "tlea2" => ['cycle_classe'  => 'TleA', 'serie'  => 'A2', 'coef_courses' => $tleA2],
              "tlec"  => ['cycle_classe'  => 'TleC', 'serie'  => 'C', 'coef_courses'  => $tleC],
              "tled"  => ['cycle_classe'  => 'TleD', 'serie'  => 'D', 'coef_courses'  => $tleD]
          ]; 



         foreach ($classes_cycle_2  as $item) {

             foreach ($item['coef_courses'] as $key => $value) {
                 CourseCoefficient::create([   
                    'cycle_classe' => $item['cycle_classe'], 
                    'serie' => $item['serie'],
                    'course_child_id' => $key,
                    'coefficient' => $value
                 ]);
             }
          }

        }


}
