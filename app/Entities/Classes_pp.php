<?php

namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;


// POUR LES PARENTS D ELEVES

class Classes_pp extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classes_pp';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
      'id', 'teacher_id', 'classroom_id'
    ];

    //
    public function classroom()
    {
      return $this->belongsTo('LMJFB\Entities\ClassRoom', 'classrooms_id');
    }

    public function tearcher()
    {
      return $this->belongsTo('LMJFB\Entities\Teacher', 'teacher_id');
    }
    //
    // public function parents()
    // {
    //    return $this->belongsTo("App\User");
    // }




}
