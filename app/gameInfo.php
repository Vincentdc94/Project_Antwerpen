<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gameInfo extends Model
{
    protected $fillable = [
    	'studiepunten', 'geld', 'plezier', 'cultuur', 'gezondheid',
    ];
}
