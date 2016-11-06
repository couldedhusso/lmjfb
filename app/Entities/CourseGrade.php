<?php namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;


class CourseGrade extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_grades';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'student_id', 'trimestre_id', 'test_id', 'grade', 'appreciation'
    ];

    public function trimestre()
    {
      return $this->belongsTo('LMJFB\Entities\Trimestre', 'trimestre_id');
    }

    public function student()
    {
      return $this->belongsTo('LMJFB\Entities\Student', 'student_id');
    }

    public function coursetest()
    {
      return $this->belongsTo('LMJFB\Entities\CourseTest', 'test_id');
    }

    // public function coursechild()
    // {
    //   return $this->belongsTo('App\CourseChildID');
    // }


}
