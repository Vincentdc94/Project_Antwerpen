<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
	protected $fillable = ['name', 'description'];

    public function campi(){
        return $this->hasMany('App\Campus');
    }
}
