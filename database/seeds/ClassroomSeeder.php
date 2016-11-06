<?php

use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

      $cycle = DB::table('cycles')->where('cycle_classe','6ème')->first();
      $nbrClass = 10;

      for ($i=1; $i <= $nbrClass*2; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => '6ème'.$i,
          'cycle_id' => $cycle->id
        ]);
      };

      $cycle = DB::table('cycles')->where('cycle_classe','5ème')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => '5ème'.$i,
          'cycle_id' => $cycle->id
        ]);
      };

      $cycle = DB::table('cycles')->where('cycle_classe','4ème')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => '4ème'.$i,
          'cycle_id' => $cycle->id
        ]);
      };


      $cycle = DB::table('cycles')->where('cycle_classe','3ème')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => '3ème'.$i,
          'cycle_id' => $cycle->id
        ]);
      };


      $nbrClass = 4;

      $cycle = DB::table('cycles')->where('cycle_classe','2ndeA')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => '2ndeA'.$i,
          'cycle_id' => $cycle->id
        ]);
      };


      $cycle = DB::table('cycles')->where('cycle_classe','2ndeC')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => '2ndeC'.$i,
          'cycle_id' => $cycle->id
        ]);
      };

      $cycle = DB::table('cycles')->where('cycle_classe','1èreA')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => '1èreA'.$i,
          'cycle_id' => $cycle->id
        ]);
      };


      $cycle = DB::table('cycles')->where('cycle_classe','1èreC')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => '1èreC'.$i,
          'cycle_id' => $cycle->id
        ]);
      };


      $cycle = DB::table('cycles')->where('cycle_classe','1èreD')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => '1èreD'.$i,
          'cycle_id' => $cycle->id
        ]);
      };


      $cycle = DB::table('cycles')->where('cycle_classe','TleA')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => 'TleA'.$i,
          'cycle_id' => $cycle->id
        ]);
      };


    $cycle = DB::table('cycles')->where('cycle_classe','TleD')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => 'TleD'.$i,
          'cycle_id' => $cycle->id
        ]);
      };

      $cycle = DB::table('cycles')->where('cycle_classe', 'TleC')->first();

      for ($i=1; $i <= $nbrClass; $i++) {
        DB::table('classrooms')->insert([
          'classroom_name' => 'TleC'.$i,
          'cycle_id' => $cycle->id
        ]);
      };

  }

}
