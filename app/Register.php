<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
  protected $table = 'registers';
  public $timestamps = true;
  protected $fillable = array('user_id', 'activities_id');

  public function activity()
  {
      return $this->belongsTo('App\Activity');
  }

  public function auteur()
  {
      return $this->belongsTo('App\User');
  }

}
