<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class TestimonialsController extends Controller
{
    /*
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'create', 'store']);
    }
    */
    
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
        /*dd(request()->all());*/

        $this->validate(request(), [
            'testimonial-title' => 'required|max:50',
            'testimonial-body' => 'required|min:20'
        ]);

        Article::create([
            'title' => request('testimonial-title'),
            'body' => request('testimonial-body'),
            'author_id' => auth()->id(),
            'category_id' => '8'
        ]);
        
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
        return view('testimonials.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('testimonials.edit');
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
        $testimonial = Article::findOrFail($id);

        $testimonial->delete();

        return redirect('admin/getuigenissen/overzicht');
    }
}
