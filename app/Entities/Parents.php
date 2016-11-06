<?php namespace LMJFB\Entities;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'parents';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id','parent_name', 'parent_last_name','parent_telephone'
  ];

  // /**
  //  * The attributes that should be hidden for arrays.
  //  *
  //  * @var array
  //  */
  // protected $hidden = [
  //     'parentPassword', 'remember_token',
  // ];

  public function student()
  {
     return $this->hasMany("LMJFB\Entities\Students");
  }

  // public function emprole()
  // {
  //   $this->hasMany('App\EmpRole');
  // }
}
