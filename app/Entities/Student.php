<?php

namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;


// POUR LES PARENTS D ELEVES

class Student extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
       'id','student_matricule', 'classroom_id', 'parent_id', 'student_name','student_last_name', 'student_birthdate',
       'student_birthplace','student_sexe', 'student_redoublant', 'student_affecte',
       'responsable_student', 'contact_responsable_student', 'student_regime','student_interne', 'id'
    ];


    // public function parent()
    // {
    //    return $this->belongsTo("App\Parent");
    // }
    //
    // // public function registrationstudent()
    // // {
    // //    return $this->hasOne("App\RegistrationStudent");
    // // }
    // public function gradeCalculation()
    // {
    //   return $this->hasMany("App\GradeCalculation");
    // }
    // //
    // // public function studentlevl()
    // // {
    // //     return $this->hasOne('App\StudentLevel');
    // // }
    //
    // public function averagegrade()
    // {
    //   return $this->hasMany('App\AverageGrade');
    // }
    //
    // public function absence()
    // {
    //   return $this->hasMany('App\Absence');
    // }
    //
    //
    public function coursegrade()
    {
      return $this->hasMany(CourseGrade::class);
    }
    //
    public function classroom()
    {
      return $this->belongsTo('LMJFB\Entities\ClassRoom', 'classrooms_id');
    }

    public function parents()
    {
      return $this->belongsTo('LMJFB\Entities\Parents', 'parents_id');
    }
    //
    // public function parents()
    // {
    //    return $this->belongsTo("App\User");
    // }




}
