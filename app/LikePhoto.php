<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikePhoto extends Model 
{

    protected $table = 'likePhotos';
    public $timestamps = true;
    protected $fillable = array('user_id', 'photo_id', 'isLike');

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

}