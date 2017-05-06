<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';

    public function school()
    {
    	return $this->belongsTo('App\School');
    }
}
