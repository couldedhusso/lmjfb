<?php

namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'course_name', 'course_description'
    ];

    public function coursechild()
    {
      return $this->hasMany('LMJFB\Entities\CourseChild');
    }

    // public function courseschedule()
    // {
    //   return $this->hasOne('App\CourseSchedule');
    // }



// ==== today
    // public function cycle()
    // {
    //   return $this->belongTo('LMJFB\Entities\Cycle', );
    // }

    // public function coursechild()
    // {
    //   return $this->hasMany('LMJFB\Entities\CourseChild');
    // }

    public function user()
    {
        return $this->belongsTo("LMJFB\Entities\User");
    }


}
