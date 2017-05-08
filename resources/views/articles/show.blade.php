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
          
          @if(isset($prevArticle)) 
            <a class="col-2 article-item" href="/artikels/{{ $prevArticle->id }}">
          @else
            <a class="col-2 article-item article-item-nohover">
          @endif
            <div class="row">
              @if(isset($prevArticle))
                <div class="col-perc-25 article-paginator-arrow article-left">
                  <i class="fa fa-angle-left"></i>
                </div>
                <div class="col-perc-75 article-paginator-text-left">
                  {{ $prevArticle->title }}
                </div>
              @else
                <div class="col-perc-25 article-item-height article-left">
                  
                </div>
                <div class="col-perc-75 article-item-height">
                  
                </div>
              @endif
            </div>
          </a>
          
          
          @if(isset($nextArticle)) 
            <a class="col-2 article-item" href="/artikels/{{ $nextArticle->id }}">
          @else
            <a class="col-2 article-item article-item-nohover">
          @endif
            <div class="row">
              @if(isset($nextArticle))
                <div class="col-perc-75 article-paginator-text-right">
                  {{ $nextArticle->title }}
                </div>
                <div class="col-perc-25 article-paginator-arrow article-right">
                  <i class="fa fa-angle-right"></i>
                </div>
              @else
                <div class="col-perc-75 article-item-height">
                  
                </div>
                <div class="col-perc-25 article-item-height article-right">
                  
                </div>
                
              @endif
            </div>
          </a>
          
        </div>
      </div>
    </div>
  @endsection
