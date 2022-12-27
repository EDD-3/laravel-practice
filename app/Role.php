<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    //Inverse Many-to-many
    public function users() {
        return $this->belongsToMany('App\User');
    
    }

}
