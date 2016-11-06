<?php

namespace LMJFB\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teachers';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'user_id', 'course_id', 'classroom_id', 'prof_principal'
    ];

    public function course()
    {
      return  $this->belongsTo("App\Course", 'course_id');
    }

    public function classroom()
    {
      return  $this->belongsTo("App\ClassRoom", 'classroom_id');
    }

    public function users()
    {
      return  $this->belongsTo("App\User", 'user_id');
    }


    // today

    public function coursetest()
    {
      return $this->hasMany('App\CourseTest');
    }


}
