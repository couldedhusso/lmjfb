<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades;

//Use DB;

use Maatwebsite\Excel\Facades\Excel;


class TeacherTest extends TestCase
{


    public function setUp(){
       parent::setUp();
       Artisan::call('migrate');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $faker = Faker\Factory::create();

        // $dummiesDatas = [
        //     "teacherFirstName" => $faker->name,
        //     "teacherLastName"=>  $faker->name,
        //     "teacherEmail"=> $faker->unique()->safeEmail,
        //     "teacherContact" => $faker->e164PhoneNumber,
        //     "email" => $faker->unique()->safeEmail,
        //     "password" => bcrypt('secret'),
        //     "CourseID" => $faker->randomDigit,
        //     "ClassRoomID" => $faker->randomDigit,
        // ];




        // Creattion de cycle et de classes_pp

        // $cycle = LMJFB\Entities\Cycle::insert([
        //   'cycle' => '1',
        //   'cycle_type' => '-',
        //   'cycle_classe' => '4ème'
        // ]);

        // $nbrClass = 10;
        // $cycle = LMJFB\Entities\Cycle::where('cycle_classe','4ème')->first();
        // for ($i=1; $i <= $nbrClass; $i++) {
        //   LMJFB\Entities\ClassRoom::insert([
        //     'classroom_name' => '4ème'.$i,
        //     'cycle_id' => $cycle->id
        //   ]);
        // };

        $this->assertGreaterThanOrEqual(1, LMJFB\Entities\Cycle::count());
        // $this->assertEquals(10, LMJFB\Entities\ClassRoom::count());

      //  $list = Excel::load('storage/app/liste.xlsx');

        $Note = Excel::load('storage/app/LMJF FICHE DE NOTES.xlsx');
        //
         $dummy = ['notes' => $Note ];
        //
        $this->call('POST', '/api/upload/student/grades', $dummy);
        //
        // $this->assertEquals(64, LMJFB\Entities\Student::count());
        $this->assertGreaterThanOrEqual(1, LMJFB\Entities\CourseGrade::count());


        //$teacher = factory(LMJFB\Entities\Teacher::class)->create();

        // $this->call('POST', 'addTeacher', $dummiesDatas);
        // $this->assertGreaterThanOrEqual(1, LMJFB\Entities\User::count());
        // $this->assertGreaterThanOrEqual(1, LMJFB\Entities\Teacher::count());



        // $this->assertTrue(true);
    }
}
