<?php

namespace App\Http\Controllers;

use LMJFB\Entities\User;
use LMJFB\Entities\Teacher;
use LMJFB\Entities\Classes_pp;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;

class TeacherController extends Controller
{

      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct()
      {
          $this->middleware('auth');
      }

      /**
       * Get a validator for an incoming registration request.
       *
       * @param  array  $data
       * @return \Illuminate\Contracts\Validation\Validator
       */
      protected function validator(array $data)
      {

          return Validator::make($data, [
              'user_first_name' => 'required|max:255',
              'user_last_name' => 'required|max:255',
          ]);
      }

      /**
       * Create a new user instance after a valid registration.
       *
       * @param  array  $data
       * @return User
       */
      protected function create(Request $request)
      {

          $reqdata = Input::except('ClassRoomID' ,'CourseID', 'name', '_token');
          $reqDataClassroom = Input::get('ClassRoomID');
          $reqDataCourse = Input::get('CourseID');
          $pp = Input::get('prof_principal');

          if ($reqdata['teacherEmail'] == "") {
             $email = $reqdata['teacherFirstName'].$reqdata['teacherLastName'].'@lmjf.com';
          }else {
            $email = $reqdata['teacherEmail'];
          }

          $user = User::create([
              'user_name' => $reqdata['teacherFirstName'],
              'user_last_name' => $reqdata['teacherLastName'],
              'user_contact' => $reqdata['teacherContact'],
              'email' => $email,
              'password' => bcrypt('lmjf'),
          ]);

          // grant Enseingnant role to user
          $user->roles()->attach(1);

          // mettre à jour la table Enseingnant
          foreach ($reqDataClassroom as $value) {

              $teacher = Teacher::create([
                 'user_id' => $user->id,
                 'course_id' => $reqDataCourse,
                 'classroom_id' => $value,
                 'prof_principal' => $pp
             ]);
          }

          if ($pp) {

            foreach (Input::get('ClassRoomID-pp') as $value) {

              $profprincipal = Classes_pp::create([
                 'teacher_id' => $user->id,
                 'classroom_id' => $value
             ]);
            }

          }

          return redirect('/home');

      }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

      //  echo phpinfo();

        // $reqDataLogin = Input::get('login');
        $reqDataClassroom = Input::get('ClassRoomID');
        // $reqdata = Input::get('userDatas');
        // $UserName = $reqdata['login'];
        // $UserPassword = $reqdata['password'];

        $reqdata = Input::except('ClassRoomID', 'name','_token');
        //      $teacher->teacherFirstName => $reqdata->teacherFirstName;
        //      $teacher->teacherLastName => $reqdata->teacherLastName;
        //      $teacher->teacherEmail => $reqdata->teacherEmail;
        //      $teacher->teacherContact => $reqdata->teacherContact;
        //      $teacher->CourseID => $reqdata->CourseID;
        //      $teacher->UserName => $reqdata->UserName;
        //      $teacher->UserPassword => $reqdata->UserPassword;
        // $teacher->save();

        $dteacher = array(
            'teacherFirstName' => $reqdata['teacherFirstName']
            ,'teacherLastName'  => $reqdata['teacherLastName']
            ,'teacherEmail'  => $reqdata['teacherEmail']
            ,'teacherContact'  => $reqdata['teacherContact']
            ,'CourseID'  => $reqdata['CourseID']
            ,'email'  => $reqdata['email']
            ,'password'  => $reqdata['password']
        );

        // // add teacher to db
         $teacher = Teacher::create($dteacher);
      //  $addclass = Teacher::find($teacher->idTeacher)->first();

        // mettre à jour la table teacher
        // foreach ($reqDataClassroom as $value) {
        //     $addclass->classRoomID = $value;
        //     $addclass->save();
        // }

        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
