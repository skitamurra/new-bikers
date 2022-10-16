<?php

namespace App\Http;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = 
    [
        'comment',
        'user_id',
        'post_id'
    ];
    
    public function post()
    {
        return $this->belongsTo('App\Http\Post');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Http\User');
    }
    
    // コメント詳細
    // public function commentdetails() {
    //       return $this->hasMany('App\Commentdetail');
    // }
}
