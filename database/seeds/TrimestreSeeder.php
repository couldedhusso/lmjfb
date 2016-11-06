<?php

use Illuminate\Database\Seeder;

class TrimestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    //  `semestreID` INT(11) NOT NULL,
    //  `semestreDescription` VARCHAR(45) NULL DEFAULT NULL,
    //  `academicYear`VARCHAR(45) NOT NULL,
    //  `startDate` VARCHAR(45) NOT NULL,
    //  `endDate` VARCHAR(45) NOT NULL,
    public function run()
    {

      $aYear = DB::table('anneescolaire')->first();

      DB::table('trimestres')->insert([
        'trimestre_description' => '1er trimestre',
        'anneescolaire_id' => $aYear->id
      ]);

      DB::table('trimestres')->insert([
        'trimestre_description' => '2e trimestre',
        'anneescolaire_id' => $aYear->id
      ]);

      DB::table('trimestres')->insert([
        'trimestre_description' => '3e trimestre',
        'anneescolaire_id' => $aYear->id
      ]);

    }
}
