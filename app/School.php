<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class School extends Model
{
	use SearchableTrait;

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'schools.name' => 10,
            'schools.description' => 7
        ],
    ];

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
