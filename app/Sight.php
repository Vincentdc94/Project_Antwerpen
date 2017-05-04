<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sight extends Model
{
	protected $table = 'sights';

    public function contact()
    {
    	return $this->hasOne('App\Contact');
    }
}
