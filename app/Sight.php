<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Sight extends Model
{
	use Searchable;

	public function searchableAs()
    {
        return 'sights_index';
    }

	protected $table = 'sights';

	protected $fillable = ['name', 'description', 'address', 'email', 'tel'];
}
