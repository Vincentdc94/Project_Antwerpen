<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Media;
use App\ArticleMedia;
use Illuminate\Support\Facades\Auth;

class TestimonialsController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Article::testimonials();

        return view('testimonials.index', compact('testimonials'));
    }

    public function overview()
    {
        $testimonials = Article::testimonials();

        return view('testimonials.overview', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'testimonial-title' => 'required|max:50',
            'testimonial-body' => 'required'
        ]);

        $article = Article::create([
            'title' => request('testimonial-title'),
            'body' => request('testimonial-body'),
            'author_id' => auth()->id(),
            'category_id' => '8'
        ]);

        $article->delete();

        if(request('media-file') === null)
        {
            session()->flash('message', 'Je getuigenis is verzonden en wacht nu op goedkeuring van een approver.');

            return redirect('getuigenissen');
        }

        $type = request('media-type');

        $url = 'nofile';

        if($type != null)
        {
            if($type == 'link'){
                $url = request('media-link');
            }else{
                $mediaPath = request('media-file')->store('public/image/testimonials');
                $url = str_replace("public/","storage/", $mediaPath);
            }

            //check of het youtube video is
            if(strpos($url, 'youtube') !== false){
                $type = 'video';
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

        session()->flash('message', 'Je getuigenis is verzonden en wacht nu op goedkeuring van een approver.');

        return redirect('getuigenissen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $testimonial = Article::findOrFail($id);

        return view('testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Article::findOrFail($id);

        return view('testimonials.edit', compact('testimonial'));
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
        $testimonial = Article::findOrFail($id);

        $testimonial->title = request('testimonial-title');
        $testimonial->body = request('testimonial-body');
        $testimonial->save();

        session()->flash('message', 'De getuigenis is succesvol aangepast.');

        return redirect('getuigenissen/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Article::withTrashed()->where('id', $id)->first();

        if($testimonial->deleted_at != null)
        {
            $testimonial->restore();
        }
        $testimonial->delete();

        session()->flash('message', 'De getuigenis is succesvol verwijderd.');

        return redirect('admin/getuigenissen/overzicht');
    }
}
