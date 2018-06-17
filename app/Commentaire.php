<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{

    protected $table = 'commentaires';
    public $timestamps = true;
    protected $fillable = array('user_id', 'description','photo_id');

    public function auteur()
    {
        return $this->belongsTo('App\User');
    }
    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

}
