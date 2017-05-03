<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	public $timestamps = true;

    public function author(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
