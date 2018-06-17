<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  protected $fillable = ['user_id', 'photo_id', 'name', 'description', 'repeat', 'date', 'time', 'validate'];

  public function votes()
  {
      return $this->hasMany('App\Vote', 'activity_id');
  }

  public function auteur()
  {
      return $this->belongsTo('App\User');
  }

  public function photos()
  {
      return $this->hasMany('App\Photo');
  }
}
