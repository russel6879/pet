<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Pet extends Model
{
    public function pet(){
        return $this->belongsTo(PetType::class,'petType','id');
    }
    public function location(){
        return $this->belongsTo(Location::class,'location','id');
    }
    public function color(){
        return $this->belongsTo(Color::class,'color','id');
    }
    public function like(){
        return $this->hasMany(Like::class,'postId');
    }
    public function authlike(){
        return $this->belongsTo(Like::class,'id','postId')->where('userId',Auth::user()->id);
    }
    public function user(){
        return $this->belongsTo(User::class,'userId','id');
    }
}
