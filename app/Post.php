<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = 
    [
        'body',
        'user_id',
        'comment_id',
        'spot_id',
        'parking_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function spot()
    {
        return $this->belongsTo('App\Spot');
    }
    
    public function parking()
    {
        return $this->belongsTo('App\Parking');
    }
    
}
