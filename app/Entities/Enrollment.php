<?php

namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'enrollments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'anneescolaire_id', 'classroom_id'
    ];

    public function anneescolaire()
    {
      return $this->belongsTo('LMJFB\Entities\AnneeScolaire', 'anneescolaire_id');
    }

    public function classroom()
    {
      return $this->belongsTo('LMJFB\Entities\ClassRoom', 'classroom_id');
    }
}
