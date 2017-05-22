<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SightMedia extends Model
{
    protected $table = 'media_sight';

    protected $fillable = ['article_id', 'media_id'];
}
