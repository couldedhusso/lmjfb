<?php

use Illuminate\Database\Seeder;

class AnneeScolaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('anneescolaire')->insert([
        'academic_year' => '2016-2017',
      ]);
    }
}
