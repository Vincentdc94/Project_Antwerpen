@extends('layouts.app')

@section('header')
    @include('partials.header-titled', array('title' => 'Nieuws'))
@endsection


@section("content")

<div class="container">

<div class="row">
 @foreach($articles as $article)
        <div class="col-perc-60-gt-30">
            <div class="news-item box-large">
                <img src="{{ asset('images/hero.jpg') }}" class="news-image" alt="Hero image">
                <div class="news-overlay">
                    <div class="news-category">{{ $article->category->name }}</div>
                    <div class="news-title">
                        <h3>{{ $article->title }}</h3>
                    </div>
                    <div class="news-button">Lees Artikel</div>
                    <div class="news-details">
                        <div class="news-author">{{ $article->author->firstName }} {{ $article->author->lastName }}</div>
                        <div class="news-date">{{ $article->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-perc-60-gt-30">
        <div class="news-item box-large">
            <img src="{{ asset('images/hero.jpg') }}" class="news-image" alt="Hero image">
            <div class="news-overlay">
                <div class="news-category">{{ 'Categorie' }}</div>
                <div class="news-title">
                    <h3>{{ 'Dit is een nieuwstitel' }}</h3>
                </div>
                <div class="news-button">Lees Artikel</div>
                <div class="news-details">
                    <div class="news-author">{{ 'Vincent De Coen' }}</div>
                    <div class="news-date">{{ '20 April 2017' }}</div>
                </div>
            </div>
        </div>
        <br />
        <div class="row" style="width: 102%;">
            <div class="col-2-gt-30">
            <div class="news-item box-medium">
            <img src="{{ asset('images/hero.jpg') }}" class="news-image" alt="Hero image">
            <div class="news-overlay">
                <div class="news-category">{{ 'Categorie' }}</div>
                <div class="news-title">
                    <h3>{{ 'Dit is een nieuwstitel' }}</h3>
                </div>
                <div class="news-button">Lees Artikel</div>
                <div class="news-details">
                    <div class="news-author">{{ 'Vincent De Coen' }}</div>
                    <div class="news-date">{{ '20 April 2017' }}</div>
                </div>
            </div>
            </div>
            </div>
            <div class="col-2-gt-30">
            <div class="news-item box-medium">
                <img src="{{ asset('images/hero.jpg') }}" class="news-image" alt="Hero image">
                <div class="news-overlay">
                    <div class="news-category">{{ 'Categorie' }}</div>
                    <div class="news-title">
                        <h3>{{ 'Dit is een nieuwstitel' }}</h3>
                    </div>
                    <div class="news-button">Lees Artikel</div>
                    <div class="news-details">
                        <div class="news-author">{{ 'Vincent De Coen' }}</div>
                        <div class="news-date">{{ '20 April 2017' }}</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-perc-40-gt-30">
        <div class="news-item">
            <div class="box-content">
                <h3 class="box-title">{{'Dit is een nieuwstitel'}}</h3>
                <p>{{'Dit is een een samenvatting van het artikel. Een inspirerend artikel om de student te overtuigen.'}}</p>
            </div>
            <div class="box-details align-right">
                <a href="{{ url('artikel/1') }}">Lees Meer...</a>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection
