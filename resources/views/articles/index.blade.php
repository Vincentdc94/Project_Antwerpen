@extends('layouts.app') 

@section('header') 
    @include('partials.header-titled', array('title' => 'Nieuws')) 
@endsection 

@section("content")

<div class="container">
    <div class="row">
        <div class="col-perc-60-gt-30">
            <a href="{{ url('/artikels/' . $articles[0]->id) }}" class="nodecoration">
            <div class="news-item box-large">
                <img src="{{ asset('images/hero.jpg') }}" class="news-image" alt="Hero image">
                <div class="news-overlay">
                    <div class="news-category">{{ $articles[0]->category->name }}</div>
                    <div class="news-title">
                        <h3>{{ $articles[0]->title }}</h3>
                    </div>
                    <div class="news-button">Lees Artikel</div>
                    <div class="news-details">
                        <div class="news-author">{{ $articles[0]->author->firstName }} {{ $articles[0]->author->lastName }}</div>
                        <div class="news-date">{{ $articles[0]->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>
            </a>

            <div class="row" style="width: 102%;">
                @for($articleIndex = 1; $articleIndex < count($articles); $articleIndex++) 
                    @if($articleIndex % 2 == 0) 
                        <div class="col-2-gt-30">
                            <a href="{{ url('/artikels/' . $articles[$articleIndex]->id) }}" class="nodecoration">
                            <div class="news-item box-medium">
                                <img src="{{ asset('images/hero.jpg') }}" class="news-image" alt="Hero image">
                                <div class="news-overlay">
                                    <div class="news-category">{{ $articles[$articleIndex]->category->name }}</div>
                                    <div class="news-title">
                                        <h3>{{ $articles[$articleIndex]->title }}</h3>
                                    </div>
                                    <div class="news-button">Lees Artikel</div>
                                    <div class="news-details">
                                        <div class="news-author">{{ $articles[$articleIndex]->author->firstName }} {{ $articles[$articleIndex]->author->lastName
                                            }}</div>
                                        <div class="news-date">{{ $articles[$articleIndex]->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endif 
            @endfor
        </div>
    </div>
    <div class="col-perc-40-gt-30">
        @for($articleIndex = 1; $articleIndex < count($articles); $articleIndex++) 
            @if($articleIndex & 2 != 0)
            <a href="{{ url('/artikels/' . $articles[$articleIndex]->id) }}" class="nodecoration">
            <div class="news-item box-medium">
                <img src="{{ asset('images/hero.jpg') }}" class="news-image" alt="Hero image">
                <div class="news-overlay">
                    <div class="news-category">{{ $articles[$articleIndex]->category->name }}</div>
                    <div class="news-title">
                        <h3>{{ $articles[$articleIndex]->title }}</h3>
                    </div>
                    <div class="news-button">Lees Artikel</div>
                    <div class="news-details">
                        <div class="news-author">{{ $articles[$articleIndex]->author->firstName }} {{ $articles[$articleIndex]->author->lastName }}</div>
                        <div class="news-date">{{ $articles[$articleIndex]->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>
            </a>
            @endif 
        @endfor

    </div>
</div>
</div>

@endsection