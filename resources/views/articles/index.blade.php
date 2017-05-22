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
                @if(isset($articles[0]->media[0])) 
                    @if($articles[0]->media[0]->type == 'video')
                        <img src="{{ str_replace(["//youtube", "//www.youtube"], "//img.youtube", str_replace("watch?v=","vi/", $articles[0]->media[0]->url . "/0.jpg")) }}" class="news-image" alt="Hero image">
                    @else
                        <img src="{{ $articles[0]->media[0]->url }}" class="news-image" alt="Hero image">
                    @endif
                @else
                    <img src="none" class="news-image" alt="Hero image">
                @endif
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
                                @if(isset($articles[$articleIndex]->media[0])) 
                                    @if($articles[$articleIndex]->media[0]->type == 'video')
                                        <img src="{{ str_replace(["//youtube", "//www.youtube"], "//img.youtube", str_replace("watch?v=","vi/", $articles[$articleIndex]->media[0]->url . "/0.jpg")) }}" class="news-image" alt="Hero image">
                                    @else
                                        <img src="{{ $articles[$articleIndex]->media[0]->url }}" class="news-image" alt="Hero image">
                                    @endif
                                @else
                                    <img src="none" class="news-image" alt="Hero image">
                                @endif
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
    
        @for($articleIndex = 1; $articleIndex < count($articles); $articleIndex++) 
        
            @if($articleIndex & 2 != 0)
            <div class="col-perc-40-gt-30">
            <a href="{{ url('/artikels/' . $articles[$articleIndex]->id) }}" class="nodecoration">
            <div class="news-item box-medium">
                @if(isset($articles[$articleIndex]->media[0]))
                    @if($articles[$articleIndex]->media[0]->type == 'video')
                        <img src="{{ str_replace(["//youtube", "//www.youtube"], "//img.youtube", str_replace("watch?v=","vi/", $articles[$articleIndex]->media[0]->url . "/0.jpg")) }}" class="news-image" alt="Hero image">
                    @else
                        <img src="{{ $articles[$articleIndex]->media[0]->url }}" class="news-image" alt="Hero image">
                    @endif
                @else
                    <img src="none" class="news-image" alt="Hero image">
                @endif
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
            </div> 
            @endif
            
        @endfor

    
</div>
</div>

@endsection