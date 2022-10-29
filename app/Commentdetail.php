<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentdetail extends Model
{
    protected $fillable = [
        'text',
        'user_id',
        'comment_id'
    ];
    
    public function comment(){
        return $this->belongsTo('App\Comment');
    }
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}
