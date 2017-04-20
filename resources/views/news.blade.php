@extends('layouts.app')

@section('header')
    @include('partials.header-titled', array('title' => 'Nieuws'))
@endsection


@section("content")
<div class="container">

@foreach ($articles as $article)
        <li>{{ $article }}</li>
    @endforeach
  <div class="news-item box-large">
    <img src="{{ asset('images/hero.jpg') }}" class="news-image" alt="Hero image">
    <div class="news-overlay">
        <div class="news-category">{{ 'Categorie' }}</div>
        <div class="news-title">
            <h3>{{ 'Dit is een nieuwstitel' }}</h3>
        </div>
        <div class="news-details">
            <div class="news-author">{{ 'Vincent De Coen' }}</div>
            <div class="news-date">{{ '20 April 2017' }}</div>
        </div>
    </div>
  </div>
</div>
@endsection