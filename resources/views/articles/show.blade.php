@extends('layouts.app')

@section("header")
  @include('partials.header')
@endsection

@section("content")
  <div class="container">
    <div class="article">
      <h1 class="article-title">{{ $article->title }}</h1 class="article-title">

        <div class="article-media">
          {{ 'media item' }}
        </div>

        <div class="article-content">
          {{ $article->body }}}
        </div>
      </div>
    </div>
    <br />
    <div class="well well-nopadding">
      <div class="container container-nopadding">
        <div class="row article-paginator">
          <a class="col-2 article-item" href="/artikels/{{ $article->id - 1 }}">
            <div class="row">
              <div class="col-perc-25 article-paginator-arrow article-left">
                <i class="fa fa-angle-left"></i>
              </div>
              <div class="col-perc-75 article-paginator-text-left">
                De titel van het vorige artikel
              </div>
            </div>
          </a>
          <a class="col-2 article-item" href="/artikels/{{ $article->id + 1 }}">
            <div class="row">
              <div class="col-perc-75 article-paginator-text-right">
                De titel van het volgende artikel
              </div>
              <div class="col-perc-25 article-paginator-arrow article-right">
                <i class="fa fa-angle-right"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    {{--<div class="container">
      <div class="article">
        <h4>Comments</h4>

        <div class="comment">
          <div class="comment-content">
            <h5 class="comment-title">{{ 'Jesse Op De Beeck' }}</h5>
            <p>{{ 'Dit is een zeer inspirerend artikel. Bedankt voor deze uitstekende leeservaring.' }}</p>
          </div>
          <div class="row">
            <div class="col-perc-75">
              <div class="comment-details">
                {{ '20 April 2017, 14:20u' }}
              </div>
            </div>
            <div class="col-perc-25">
              <div class="comment-button">
                Antwoorden
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>--}}
  @endsection
