<?php

namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseChild extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_childs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id', 'course_id', 'label_course'
    ];


// ==== today

    public function course()
    {
      return $this->belongsTo('LMJFB\Entities\Course');
    }

    public function coursetest()
    {
      return $this->hasMany('LMJFB\Entities\CourseTest');
    }

    public function averagegrade()
    {
      return $this->hasMany('LMJFB\Entities\AverageGrade');
    }

    public function coursecoefficient()
    {
      return $this->hasMany('LMJFB\Entities\CourseCoefficient');
    }

}
