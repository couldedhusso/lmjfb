<?php

use Illuminate\Database\Seeder;

class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cycle = DB::table('cycles')->insert([
          'cycle' => '1',
          'cycle_type' => '-',
          'cycle_classe' => '6ème'
        ]);

        $cycle = DB::table('cycles')->insert([
          'cycle' => '1',
          'cycle_type' => '-',
          'cycle_classe' => '5ème'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '1',
          'cycle_type' => '-',
          'cycle_classe' => '4ème'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '1',
          'cycle_type' => '-',
          'cycle_classe' => '3ème'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '2',
          'cycle_type' => 'litteraire',
          'cycle_classe' => '2ndeA'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '2',
          'cycle_type' => 'scientifique',
          'cycle_classe' => '2ndeC'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '2',
          'cycle_type' => 'litteraire',
          'cycle_classe' => '1èreA'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '2',
          'cycle_type' => 'scientifique',
          'cycle_classe' => '1èreC'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '2',
          'cycle_type' => 'scientifique',
          'cycle_classe' => '1èreD'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '2',
          'cycle_type' => 'litteraire',
          'cycle_classe' => 'TleA'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '2',
          'cycle_type' => 'scientifique',
          'cycle_classe' => 'TleD'
        ]);
        $cycle = DB::table('cycles')->insert([
          'cycle' => '2',
          'cycle_type' => 'scientifique',
          'cycle_classe' => 'TleC'
        ]);
    }
}
