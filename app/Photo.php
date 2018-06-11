<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model 
{

    protected $table = 'photos';
    public $timestamps = true;
    protected $fillable = array('user_id', 'photo');

    public function auteur()
    {
        return $this->belongsTo('App\User');
    }

    public function activity()
    {
        return $this->belongsTo('App\Activity');
    }

    public function like()
    {
        return $this->hasMany('App\LikePhoto', 'photo_id');
    }

}