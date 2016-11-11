<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use LMJFB\Entities\Student;
use LMJFB\Entities\Teacher;
use LMJFB\Entities\Enrollment;
use LMJFB\Entities\Parents;

use DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use LMJFB\Repositories\DbClassroomRepositories;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

    // TODO : le revoir la logique de compte pr les parents d eleve
    // /**
    //  * Display a listing of the resource.
    //  * supprimer la classe ds la table enrollments après de celle-ci
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $DBRepository ;
    public function __construct(DbClassroomRepositories $repos)
    {
        $this->DBRepository = $repos ;
    }


    public function seed_classroom()
    {

    // ISSUE : TlA3 : probleme de matricule : certains eleves ont le meme numero matricule
    //                d'autre se retrouve dans deux classes

      Excel::load('storage/app/listes.xlsx', function($reader)
      {

        $reader->formatDates(true, 'd/m/Y');
        $results = $reader->all();

        $aYear = $this->DBRepository->getcurrentAYear();

        foreach($results as $sheet)
        {
                $classroomname = $sheet->getTitle();

                $classroom = $this->getclassroomByName($classroomname);

                $studEnrol = DB::table('enrollments')
                      ->where('classroom_id', $classroom->id)->count();

                if ($studEnrol == 0) {
                    $newStudent = Enrollment::create([
                        'anneescolaire_id' => $aYear->id,
                        'classroom_id'  => $classroom->id
                    ]);
                }

             foreach ($sheet as $row) {

                 $doublant = "Non";
                 if ($row['red'] == "R"){
                       $doublant = "Oui";
                  }

                 // save student in db
                 if ($row['matricule'] != null) {
                     $stud = [
                            'student_matricule' => $row['matricule']
                            ,'classroom_id' => $classroom->id
                            ,'student_name' => $row['nom']
                            ,'student_last_name' => $row['prenoms']
                            ,'student_birthdate' => $row['date_naiss']
                            ,'student_sexe' => 'F'
                            ,'student_redoublant' => $doublant
                      ];

                     $newStudent = Student::create($stud);
               }

             }
         }
      }, 'UTF-8');

     return redirect('/home');
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $aYear = DB::table('anneescolaire')->orderBy('id', 'desc')
                        ->first();

        //$avatar = Input::get()
        $reqdata = Input::get('studentDatas');
        $studresp =  Input::get('studentRespoDatas');

      //  dd($reqdata['anneeScolaire']);

        $dParents =[
            'parent_name' => $studresp['nom']
            ,'parent_last_name'  => $studresp['prenom']
            ,'parent_telephone'  => $studresp['contact']
        ];

        // create parent student
        $studentparent = Parents::create($dParents);

        $studEnrol = DB::table('enrollments')->where('classroom_id',
                              $reqdata['classroom'])->count();

        if ($studEnrol == 0) {
            $newStudent = Enrollment::create([
                'anneescolaire_id' => $aYear->id,
                'classroom_id'  => $reqdata['classroom']
            ]);

       }

      //  $studentparent = Parent::create([$studresp]);

        // save student in db
        $stud = [
            'student_matricule' => $reqdata['matricule']
            ,'classroom_id' => $reqdata['classroom']
            ,'student_name' => $reqdata['nom']
            ,'student_last_name' => $reqdata['prenoms']
            ,'student_birthdate' => $reqdata['birthdate']
            ,'student_sexe' => $reqdata['sexe']
            ,'student_birthplace' => $reqdata['birthplace']
            ,'student_regime' => $reqdata['regime']
            ,'student_interne' => $reqdata['interne']
            ,'student_affecte' => $reqdata['affecte']
            ,'student_redoublant' => $reqdata['doublant']
            ,'responsable_student' => $studresp['nom'].' '.$studresp['prenom']
            ,'contact_responsable_student' => $studresp['contact']
            ,'parents_id' => $studentparent->id
        ];

        $newStudent = Student::create($stud);


        return redirect('/home');

    }

    private function getclassroomByName($classroom){

      return DB::table('classrooms')->where('classroom_name', $classroom)
                        ->select('id')->first();
    }


    public function getStudentListe($id){

      $studentByclassroom = $this->DBRepository->getStudentsByClassroom($id);
      $studCollect = collect([]);
      foreach ($studentByclassroom as  $value) {

            $student = [
              'Matricule'       => $value->student_matricule
              ,'Nom et prenoms' => $value->student_name.' '.$value->student_name
              ,'Date de naiss'  => $value->student_birthdate
              ,'Redoublant(e)'  => $value->student_redoublant
            ];

            $studCollect->push($student);
      }

      Excel::create('Liste de classe', function($excel) use($studCollect) {

          // Set the title
          $excel->setTitle('Liste de classe');
          $excel->sheet('Liste de classe', function($sheet) use($studCollect) {
              $sheet->fromArray($studCollect);
          });

      })->download('xlsx');

      return redirect()->back();
    }


}
