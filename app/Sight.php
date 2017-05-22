<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Sight extends Model
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
            'sights.name' => 10,
            'sights.description' => 7,
            'sights.address' => 5,
            'sights.email' => 4
        ],
    ];

	protected $table = 'sights';

	protected $fillable = ['name', 'description', 'address', 'email', 'tel'];

    public function media(){
        return $this->belongsToMany('App\Media');
    }
}
