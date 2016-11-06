
<?php

namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;


class Trimestre extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trimestres';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','trimestre_description', 'anneescolaire_id', 'start_date', 'end_date'
    ];

    public function anneescolaire()
    {
        return $this->belongsTo('App\AnneeScolaire', 'anneescolaire_id');
    }

    // today
    public function coursetest()
    {
      return $this->hasMany('App\CourseTest');
    }

    public function averagegrade()
    {
      return $this->hasMany('App\AverageGrade');
    }

}
