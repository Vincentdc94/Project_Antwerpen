@extends('layouts.app')

@section("header")
  @include('partials.header')
@endsection

@section("content")
  <div class="container">
  <form method="POST" action="/admin/artikels/{{$article->id}}/beoordelen">
  <input type="hidden" name="_method" value="PATCH">
  {{ csrf_field() }}
    <div class="article article-padding-bottom">
      <h1 class="article-title">{{ $article->title }}</h1 class="article-title">

        @if(isset($article->media[0]))
          @if($article->media[0]->type == 'video')
            <div class="article-media">
              <iframe class="video" src="{{ str_replace("watch?v=","embed/", $article->media[0]->url) }}" width="650" height="480"></iframe>
            </div>
          @else
            <div class="article-media">
              <img class="image" src="{{ url($article->media[0]->url) }}" alt="{{ $article->title }}"/>
            </div>
          @endif
        @endif

        <div class="article-content">
          {!! $article->body !!}
        </div>
      </div>
    </div>

      <div class="row">
        <div class="col-perc-25-gt-2">
          <button class="button--primary button--block gt-20">Goedkeuren</button>
        </div>
      </div>

    <br />
    {{--<div class="well well-nomargin well-nopadding fit-footer">
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
                
              @endif--}}
            </div>
          </a>
          
        </div>
      </div>
    </form>
    </div>
  @endsection
