<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    public function sight()
    {
    	return $this->belongsTo('App\Sight');
    }

    public function campus()
    {
    	return $this->belongsTo('App\Campus');
    }
}
