<?php

namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;

class ProfPrincipal extends Model
{


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'prof_principaux';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'teacher_id'
    ];

    public function teacher()
    {
      return $this->belongsTo('LMJFB\Entities\Teacher', 'teacher_id');
    }

    public function classe_pp()
    {
      return $this->hasMany('LMJFB\Entities\Classe_pp');
    }

}
