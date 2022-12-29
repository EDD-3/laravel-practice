<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    //Polymorphic Many-to-many
    public function posts() {
        return $this->morphedByMany('App\Post', 'taggable');
    }

    
    //Polymorphic Many-to-many
    public function videos() {
       return $this->morphedByMany('App\Video', 'taggable');
    }
}
