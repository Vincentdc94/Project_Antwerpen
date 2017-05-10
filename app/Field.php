<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Field extends Model
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
            'fields.name' => 10
        ],
    ];

    protected $table = 'fields';

    public function school()
    {
    	return $this->belongsTo('App\School');
    }
}
