<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    public function sight()
    {
    	return $this->hasOne('App\Sight');
    }

    public function campus()
    {
    	return $this->hasOne('App\Campus');
    }
}
