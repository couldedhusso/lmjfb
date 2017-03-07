<?php namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseCoefficient extends Model
{
protected $table = 'course_coefficient';

    protected $fillable = ['cycle_classe', 'course_child_id', 'serie', 'coefficient'];

    // public function cycle(){
    //     return $this->belongsTo('LMJFB\Entities\Cycle');
    // }

    public function coursechild(){
        return $this->belongsTo('LMJFB\Entities\CourseChild');
    }


}
