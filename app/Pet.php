<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    public function pet(){
        return $this->belongsTo(PetType::class,'petType','id');
    }
    public function like(){
        return $this->hasMany(Like::class,'postId');
    }
    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
}
