<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'user_name','user_last_name', 'user_contact',
        'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
       return $this->belongsToMany("LMJFB\Entities\Roles");
    }

    public function courses()
    {
       return $this->belongsToMany("LMJFB\Entities\Course");
    }

    public function hasRole($name){
      foreach ($this->roles as  $role) {
        if ($role->name == $name) return true;
      }
      return false;
    }
}
