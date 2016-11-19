<?php

namespace  LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;


class Cycle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cycles';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
      'id', 'cycle', 'cycle_classe', 'cycle_type'
    ];

}
