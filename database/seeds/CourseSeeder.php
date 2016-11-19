<?php

use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //  `courseID` INT(11) NOT NULL AUTO_INCREMENT,
    //  `cycleID` INT(11) NOT NULL ,
    //  `courseName` VARCHAR(45) NULL DEFAULT NULL,
    //  `courseDescription` VARCHAR(45) NULL DEFAULT NULL,
    //  `courseCoeff` VARCHAR(45) NOT NULL,
    public function run()
    {

        $courses = [
          '1' => 'FRANÇAIS', '2' => 'ANGLAIS', '3'=> 'HISTOIRE-GÉOGRAPHIE',
          '4' => 'ALLEMAND', '5' => 'ESPAGNOL', '6' => 'PHILOSOPHIE',
          '7' => 'MATHÉMATIQUES', '8' => 'PHYSIQUE - CHIMIE',
          '9' => 'SCIENCES DE LA VIE ET DE LA TERRE',
          '10' => 'EDUCATION PHYSIQUE ET SPORTIVE',
          '11' => 'MUSIQUE', '12' => 'CONDUITE', '13' => 'EDUCATION DES DROITS DE L\'HOMME'
        ];

        $coursesChild = [
          '1' => 'Expression écrite',
          '2' => 'Expression orale',
          '3'=> 'Orthographe'
        ];

        DB::table('course_childs')->insert([
          'course_id' => '1',
          'label_course' => 'FRANÇAIS',
        ]);

        // Discipline du premier cycle
        foreach ($courses as $key => $value) {
          DB::table('courses')->insert([
            'course_name' => $value,
            'course_description' => '-'
          ]);

          // ====== CourseChild
          if ($key == '1') {
            foreach ($coursesChild as $key => $value) {
              DB::table('course_childs')->insert([
                'course_id' => '1',
                'label_course' => $value,
              ]);
            }
          }
          else {
            DB::table('course_childs')->insert([
              'course_id' => $key,
              'label_course' => $value,
            ]);
          }
        }








        // $coeffTab = ['1' => '3', ... ];
        // // Discipline du second cycle scientifique
        // foreach ($courses as $key => $value) {
        //   if ($key != '13') {
        //       DB::table('Course')->insert([
        //         'cycleID' => '2',
        //         'courseName' => $value,
        //         'courseCoeff' => $coeffTab[$key]
        //       ]);
        //   }
        // }

        // $coeffTab = ['1' => '3', ... ];
        // // Discipline du second cycle litteraire
        // foreach ($courses as $key => $value) {
        //   if ($key != '13') {
        //       DB::table('Course')->insert([
        //         'cycleID' => '3',
        //         'courseName' => $value,
        //         'courseCoeff' => $coeffTab[$key]
        //       ]);
        //   }
        // }

    }
}
