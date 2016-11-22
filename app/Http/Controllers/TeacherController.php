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

use Maatwebsite\Excel\Facades\Excel;
use LMJFB\Repositories\DbClassroomRepositories;

use PHPOffice\PHPExcel;
// use PHPOffice\IOFactory\PHPExcel_IOFactory;


class TeacherController extends Controller
{

      /**
       * Create a new controller instance.
       *
       * @return void
       */

      private $DBRepository ;

      public function __construct(DbClassroomRepositories $repos)
      {
          $this->DBRepository = $repos ;
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
          $reqDataCourse = Input::get('course_id');
          $pp = Input::get('prof_principal');
          // dd($reqdata);

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

          foreach ($reqDataCourse as $course_id) {
                 $user->courses()->attach($course_id);
          }

          // mettre à jour la table Enseingnant
          foreach ($reqDataClassroom as $value) {

              $teacher = Teacher::create([
                 'user_id' => $user->id,
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
    public function listeProfesseur()
    {

        $enseignantsCollect = [];
        $enseignants = $this->DBRepository->getTeachersByClassroomAndCourses();

      //  dd($enseignants);

        foreach ($enseignants as $value) {

            array_push($enseignantsCollect, [

               'Concatener' => $value->label_course.' '.$value->classroom_name,
               'Matière/Sous-matière' => $value->label_course,
               'Classe > Groupe' => $value->classroom_name,
               'Professeur' => $value->user_name.' '.$value->user_last_name
            ]);

        }

    //   dd($enseignantsCollect);
        Excel::create('Gestion des performances', function($excel) use($enseignantsCollect) {

            // Set the title
            $excel->setTitle('DB PROF');
            $excel->sheet('DB PROF', function($sheet) use($enseignantsCollect) {
                $sheet->fromArray($enseignantsCollect);
            });

        })->download('xlsx');

        return redirect('/home') ;
    }
}
