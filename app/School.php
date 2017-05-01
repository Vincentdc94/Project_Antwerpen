<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    public function campi(){
        return $this->hasMany('App\Campus');
    }
}
