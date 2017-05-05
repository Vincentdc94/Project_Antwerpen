<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Media;

class NewsController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::news();
        
        return view('articles.index', compact('articles'));
    }

    public function overview()
    {
        $articles = Article::news();

        return view('articles.overview', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $article = new Article();

      $article->title = $request->article["title"];
      $article->body = $request->article["text"];
      $article->author_id = $request->article["author"];
      $article->category_id = $request->article["category"];

      $article->save();

      $mediaData = $request->article["media"];

      for($mediaIndex = 0; $mediaIndex < $mediaData; $mediaIndex++){
        $media = new Media();

        //TODO: add url checker om te zien of video of image
        $media->type = "image";
        $media->url = $mediaData[$mediaIndex]["value"];

        $media->save();

        $articleMedia = new ArticleMedia();
        $articleMedia->article_id = $article->id;
        $articleMedia->media_id = $media->id;
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('articles.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('articles.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
