<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	use Searchable;

	public function searchableAs()
    {
        return 'links_index';
    }

    protected $table = 'links';

    protected $fillable = ['name', 'url', 'description'];
}
