<?php

namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classrooms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'classroom_name', 'cycle_id'
    ];

    public function teacher()
    {
      return $this->hasMany('LMJFB\Entities\Teacher');
    }

    public function student()
    {
      return $this->hasMany('LMJFB\Entities\Student');
    }

    public function cycle()
    {
      return $this->belongsTo('LMJFB\Entities\Cycle', 'cycle_id');
    }

    // public function courseschedule()
    // {
    //   return $this->hasOne('App\CourseSchedule');
    // }

}
