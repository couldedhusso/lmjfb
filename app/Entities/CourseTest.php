<?php namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseTest extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // maxGradevalue == note optenue
    protected $fillable = [
       'id', 'trimestre_id', 'course_childs_id','classroom_id', 'max_grade_value',
        'test_name'
    ];

    public function coursechild()
    {
      return $this->belongsTo('LMJFB\Entities\CourseChild', 'course_childs_id');
    }

    public function semestre()
    {
      return $this->belongsTo('LMJFB\Entities\Trimestre', 'trimestre_id');
    }

    // public function coursegrade()
    // {
    //   return $this->hasOne('App\CourseGrade');
    // }
}
