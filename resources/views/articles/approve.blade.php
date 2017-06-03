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

      <div class="row">
        <div class="col-perc-50-gt-2">
          <button class="button--primary button--block gt-20">Goedkeuren</button>
        </div>
      </div>
      </div>
    <br />
    </div>
  </form>
</div>
@endsection
