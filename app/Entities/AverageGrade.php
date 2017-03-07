<?php namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;


class AverageGrade extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course_average';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // position == rang de l eleve

    protected $fillable = [
       'id', 'trimestre_id', 'student_id', 'position', 'nbre_student',
       'comittee_appreciation', 'average_grade', 'course_childs_id'
    ];

    public function trimestre()
    {
      return $this->belongsTo('LMJFB\Entities\Trimestre', 'trimestre_id');
    }

    public function student()
    {
      return $this->belongsTo('LMJFB\Entities\Student', 'student_id');
    }

    public function coursechild()
    {
      return $this->belongsTo('LMJFB\Entities\CourseChild', 'course_childs_id');
    }

}
