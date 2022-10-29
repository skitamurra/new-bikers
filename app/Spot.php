<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
    protected $fillable = [ 'address' ];
    
    public function post() 
    {
        return $this->hasOne('App\Post');
    }
}
