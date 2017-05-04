<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $guarded = ['id', 'approved', 'frontPage'];
    protected $fillable = ['title', 'body', 'author_id', 'category_id'];

    public $timestamps = true;

    public function author(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public static function testimonials()
    {
    	return static::where('category_id', '8')->get();
    }

    public static function news()
    {
    	return static::where('category_id', '!=', '8')->get();
    }
}
