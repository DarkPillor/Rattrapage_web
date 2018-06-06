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
        'name', 'firstname', 'email', 'type', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function activities()
{
    return $this->hasMany('App\Activity', 'user_id');
}

public function votes()
{
    return $this->hasMany('App\Vote', 'user_id');
}

public function commentaires()
{
    return $this->hasMany('App\Commentaire', 'user_id');
}

public function photos()
{
    return $this->hasMany('Photo', 'user_id');
}

public function aLike()
{
    return $this->hasMany('App\LikePhoto', 'user_id');
}
}
