<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Article extends Model
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
            'articles.title' => 10,
            'articles.body' => 5
        ],
    ];

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
