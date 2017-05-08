<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
	use Searchable;

	public function searchableAs()
    {
        return 'fields_index';
    }

    protected $table = 'fields';

    public function school()
    {
    	return $this->belongsTo('App\School');
    }
}
