<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campi';

    public function school()
    {
        return $this->belongsTo('App\School');
    }
}
