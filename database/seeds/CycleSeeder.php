<?php

use Illuminate\Database\Seeder;
use LMJFB\Entities\Cycle;


class CycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '1',
    //       'cycle_type' => '-',
    //       'cycle_classe' => '6ème'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '1',
    //       'cycle_type' => '-',
    //       'cycle_classe' => '5ème'
    //     ]);
        
    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '1',
    //       'cycle_type' => '-',
    //       'cycle_classe' => '4ème'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '1',
    //       'cycle_type' => '-',
    //       'cycle_classe' => '3ème'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'litteraire',
    //       'cycle_classe' => '2ndeA',
    //       'cycle_serie' => 'A1'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'litteraire',
    //       'cycle_classe' => '2ndeA',
    //       'cycle_serie' => 'A2'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'scientifique',
    //       'cycle_classe' => '2ndeC',
    //       'cycle_serie' => 'C'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'litteraire',
    //       'cycle_classe' => '1èreA',
    //       'cycle_serie' => 'A1'
    //     ]);


    //      $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'litteraire',
    //       'cycle_classe' => '1èreA',
    //       'cycle_serie' => 'A2'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'scientifique',
    //       'cycle_classe' => '1èreC',
    //       'cycle_serie' => 'C'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'scientifique',
    //       'cycle_classe' => '1èreD',
    //       'cycle_serie' => 'D'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'litteraire',
    //       'cycle_classe' => 'TleA',
    //       'cycle_serie' => 'A1'

    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'litteraire',
    //       'cycle_classe' => 'TleA',
    //       'cycle_serie' => 'A2'
    //     ]);


    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'scientifique',
    //       'cycle_classe' => 'TleD',
    //       'cycle_serie' => 'D'
    //     ]);

    //     $cycle = DB::table('cycles')->insert([
    //       'cycle' => '2',
    //       'cycle_type' => 'scientifique',
    //       'cycle_classe' => 'TleC',
    //       'cycle_serie' => 'C'
    //     ]);
    // }

    /// , 'TleA' =>

    //   $cycle = Cycle::create([
    //             'cycle' => '2',
    //             'cycle_type' => 'litteraire',
    //             'cycle_classe' => 'TleA',
    //             'cycle_serie' => 'A2'
    //  ]);


    //   $classname = 'TleA2';

    //   DB::table('classrooms')->where('classroom_name', '=', $classname)
    //                                 ->update(['cycle_id' => $cycle->id]);



      // $tb = ['2ndeA' => 'A1', '2ndeC' => 'C', '1èreA' => 'A1'
      //       ,'1èreC' => 'C', '1èreD' => 'D'];

      // foreach ($tb as $key => $value) {

      //     DB::table('cycles')->where('cycle_classe', '=', $key)
      //                       ->update(['cycle_serie' => $value]);

      //     if (preg_match("#A$#", $key)) {


      //       /// nous ajoutons les series A2 pour cycles dont la classe est xxA
      //       /// par exemple la serie à A1 de 2ndeA sera mise à jour et 
      //       /// ns ajouterons la serie A2 pour les 2ndeA et mettons à jour les classes de 2ndeA2   

      //        $cycle = Cycle::create([
      //           'cycle' => '2',
      //           'cycle_type' => 'litteraire',
      //           'cycle_classe' => $key,
      //           'cycle_serie' => 'A2'
      //         ]);


      //         $classname = $key.'2';

      //         DB::table('classrooms')->where('classroom_name', '=', $classname)
      //                               ->update(['cycle_id' => $cycle->id]);
      //     }
      // }


  }
}



// DB::table('cycles')->where('cycle_classe', '=', 'TleD')->update(['cycle_serie' => 'D'])