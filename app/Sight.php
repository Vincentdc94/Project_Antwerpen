<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sight extends Model
{
	protected $table = 'sights';

	protected $fillable = ['name', 'description', 'address', 'email', 'tel'];
}
