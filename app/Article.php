<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'articles_index';
    }

	protected $guarded = ['id', 'approved', 'frontPage'];
    protected $fillable = ['title', 'body', 'author_id', 'category_id'];

    public $timestamps = true;

    protected $table = 'articles';

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function media(){
        return $this->belongsToMany('App\Media');
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
