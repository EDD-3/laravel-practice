<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //One-to-one relationship
    public function post (){
        
        return $this->hasOne('App\Post'); //Looks for the column user_id by default on the posts table
    }

    //One to many relationship
    public function posts () {

        return $this->hasMany('App\Post');
    }

    //Many-to-many relationship
    public function roles() {

        return $this->belongsToMany('App\Role')->withPivot('created_at');

        //If you don't follow convention
        // return $this->belongsToMany('App\Role','user_roles','user_id','role_id');
    }

    //Polymorphic one-to-many
    public function photos () {

        return $this->morphMany('App\Photo','imageable');
    }

    //Accessor, transforms the data from the database without changing it in the database
    public function getNameAttribute($value) {
        return ucfirst($value);
    }
}
