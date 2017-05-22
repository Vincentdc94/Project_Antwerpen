<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Category;
use App\Media;
use App\ArticleMedia;

class NewsController extends Controller
{   
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
        $articles = Article::withTrashed()->get();

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
        //dd(request()->all());

        $this->validate(request(), [
            'article-title' => 'required',
            'article-text' => 'required',
            'category' => 'required'
        ]);

        $article = Article::create([
            'title' => request('article-title'),
            'body' => request('article-text'),
            'author_id' => auth()->id(),
            'category_id' => request('category')
        ]);

        $type = request('media-type');

        $url = 'nofile';

        if($type != null)
        {
            if($type == 'link')
            {
                $url = request('media-link');

                if (strpos($url, 'youtube') !== false) {
                    $type = 'video';
                }
            }
            else
            {
                $mediaPath = request('media-file')->store('public/image/articles');
                $url = str_replace("public/","storage/", $mediaPath);
            }

            $media = new Media();

            $media->url = $url;
            $media->type = $type;
            $media->save();

            $articleMedia = new ArticleMedia();
            
            $articleMedia->article_id = $article->id;
            $articleMedia->media_id = $media->id;
            $articleMedia->save();
        }

        $article->delete();

        return redirect('admin/artikels/overzicht');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        $nextId = Article::where('id', '>', $id)->min('id');
        $prevId = Article::where('id', '<', $id)->max('id');
        
        $nextArticle = Article::find($nextId);
        $prevArticle = Article::find($prevId);

        return view('articles.show', compact('article', 'nextArticle', 'prevArticle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::withTrashed()->where('id', $id)->first();
        $categories = Category::all();

        return view('articles.edit')->with(compact('article'))->with(compact('categories'));
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
        $article = Article::findOrFail($id);

        $this->validate(request(), [
            'article-title' => 'required',
            'article-text' => 'required',
            'category' => 'required'
        ]);

        $article->title         = request('article-title');
        $article->body          = request('article-text');
        $article->category_id   = request('category');
        $article->save();

        //BEGIN gekopieerd stuk van create artikel

        $type = request('media-type');

        $url = 'nofile';

        if($type == 'link'){
            $url = request('media-link');

            if (strpos($url, 'youtube') !== false) {
                $type = 'video';
            }
        }else{
            $mediaPath = request('media-file')->store('public/image/articles');
            $url = str_replace("public/","storage/", $mediaPath);
        }

        $media = Media::where('');

        $media->url = $url;
        $media->type = $type;
        $media->save();


        $articleMedia = new ArticleMedia();
        
        $articleMedia->article_id = $article->id;
        $articleMedia->media_id = $media->id;
        $articleMedia->save();

        //EINDE stuk van create artikel

        return redirect('artikels/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $article->forceDelete();

        return redirect('admin/artikels/overzicht');
    }

    public function approverShow($id)
    {
        $article = Article::withTrashed()->where('id', $id)->first();

        return view('articles.approve', compact('article'));
    }

    public function approverUpdate(Request $request, $id)
    {
        $article = Article::withTrashed()->where('id', $id)->first();

        $article->restore();

        return redirect('admin/artikels/overzicht');
    }
}
