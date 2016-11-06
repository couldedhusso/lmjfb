<?php

namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;


class AnneeScolaire extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'anneescolaire';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     // position == rang de l eleve
    protected $fillable = [
       'id','academic_year'
    ];

    public function enrollment()
    {
      return $this->hasMany('LMJFB\Entities\Enrollment');
    }

    public function trimestre()
    {
      return $this->hasMany('LMJFB\Entities\Trimestre');
    }


}
