<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameInfo extends Model
{
    protected $fillable = [
    	'total_beers_drunk', 'total_hours_studied', 'total_exams_failed', 'total_exams_passed', 'total_money_spent', 'total_time_sported', 'total_time_culture', 'total_time_party', 'total_time_coma', 'total_time_blackout', 'user_id'
    ];

    protected $table = 'gameinfo';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
