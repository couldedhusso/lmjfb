<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use LMJFB\Entities\Student;
use LMJFB\Entities\Teacher;
use LMJFB\Entities\Enrollment;
use LMJFB\Entities\Parents;

use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{

    // TODO : le revoir la logique de compte pr les parents d eleve
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

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
