<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
	use Searchable;

	public function searchableAs()
    {
        return 'schools_index';
    }

	protected $fillable = ['name', 'description'];

	protected $table = 'schools';

	/*
 	public function campi(){
 		return $this->hasMany('App\Campus');
 	}
	*/

    public function fields()
    {
        return $this->hasMany('App\Field');
    }
}
