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
          'user_contact' => '-',
          'email' => 'Freddy.Nadje@lmjf.com',
          'password' => bcrypt('lmjf'),
      ]);

      $user->roles()->attach(2);
      // $user->roles()-attach(4);


      $user = User::create([
          'user_name' => 'Tan',
          'user_last_name' => 'Kpan Roger',
          'user_contact' => '-',
          'email' => 'Tan.Kpan.Roger@lmjf.com',
          'password' => bcrypt('lmjf_tkp'),
      ]);

      $user->roles()->attach(2);
      // $user->roles()-attach(4);


      $user = User::create([
          'user_name' => 'Kone',
          'user_last_name' => 'Mamadou',
          'user_contact' => '-',
          'email' => 'Kone.Mamadou@lmjf.com',
          'password' => bcrypt('lmjf_km'),
      ]);

      $user->roles()->attach(2);
      // $user->roles()-attach(4);

      $user = User::create([
          'user_name' => 'Kouassi',
          'user_last_name' => 'Wadja',
          'user_contact' => '-',
          'email' => 'Kouassi.Wadja@lmjf.com',
          'password' => bcrypt('lmjf_wk'),
      ]);

      $user->roles()->attach(2);
      // $user->roles()-attach(4);

      $user = User::create([
          'user_name' => 'Kouakou',
          'user_last_name' => 'Williams',
          'user_contact' => '-',
          'email' => 'Kouakou.Williams@lmjf.com',
          'password' => bcrypt('lmjf_kw'),
      ]);

      $user->roles()->attach(2);
      // $user->roles()-attach(4);

      $user = User::create([
          'user_name' => 'Tondossama',
          'user_last_name' => 'Karim',
          'user_contact' => '-',
          'email' => 'Tondossama.Karim@lmjf.com',
          'password' => bcrypt('lmjf_tk'),
      ]);

      $user->roles()->attach(2);
      // $user->roles()-attach(4);









    }

}
