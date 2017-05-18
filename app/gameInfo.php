<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameInfo extends Model
{
    protected $fillable = [
    	'studiepunten', 'geld', 'plezier', 'cultuur', 'gezondheid',
    ];

    protected $table = 'gameinfo';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
