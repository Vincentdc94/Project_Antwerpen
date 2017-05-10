<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Link extends Model
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
            'links.name' => 10,
            'links.description' => 5
        ],
    ];

    protected $table = 'links';

    protected $fillable = ['name', 'url', 'description'];
}
