<?php

use Illuminate\Database\Seeder;

use LMJFB\Entities\User;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      $user = User::create([
          'user_name' => 'Nadje',
          'user_last_name' => 'Freddy',
          'user_contact' => '123',
          'email' => 'Freddy.Nadje@lmjf.com',
          'password' => bcrypt('lmjf'),
      ]);

      $user->roles()->attach(2);
      // $user->roles()-attach(4);
    }
}
