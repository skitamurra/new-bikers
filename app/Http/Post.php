<?php

namespace App\Http;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = 
    [
        'body',
        'user_id',
        'comment_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Http\User');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Http\Comment');
    }
    
}
