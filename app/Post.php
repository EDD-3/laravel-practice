<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    //
    //protected $table = 'posts';
    
    //protected $primaryKey = 'post_id';

    protected $date = ['deleted_at'];

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];
    //One-to-one inverse relationship
    public function user() {
        return $this->belongsTo('App\User');
    }
}
