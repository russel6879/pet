<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    public function userlike(){
        return $this->belongsTo(User::class,'userId','id')->where('id',Auth::user()->id);
    }
}
