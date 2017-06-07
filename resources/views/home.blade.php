@extends('layouts.app')

@section("header")
  <script>
    if(localStorage.intro === undefined || localStorage.intro !== 'shown'){
      localStorage.setItem('intro', 'shown');
      window.location = "{{ url('/introductie') }}";
    }
  </script>
  @include('partials.header-hero', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">
  <div class="row">
    <div class="col-perc-60-gt-2">
      <h2>Antwerpen De studentenstad</h2>

      <iframe class="video" src="{{ str_replace("watch?v=","embed/", $testimonial->media[0]->url) }}" width="650" height="450"></iframe>
    
    </div>
    <div class="col-perc-40-gt-2">
      <h2>Nieuws</h2>
      @foreach($articles as $article)
        <div class="box box-colored box-margin">
          <div class="box-content">
            <div class="box-title"> 
              {{ $article->title }}
            </div>
            <p>{!! strip_tags(str_limit($article->body, 50, '...')) !!}</p>
          </div>
          <div class="box-details align-right">
            <a class="button--link" href="{{ url('/artikels/' . $article->id) }}">Lees Meer</a>
          </div>
        </div>
      @endforeach

      <div class="align-center">
        <a class="button--link" href="{{ url('/nieuws') }}">Meer Nieuws</a>
      </div>
    </div>
  </div>
  <h2>Bezienswaardigheden</h2>
  <div class="row">
    @foreach($sights as $sight)
      <a href="{{ url('/bezienswaardigheden/' . $sight->id) }}" class="nodecoration">
      <div class="col-3-gt-1">
        @if(isset($sight->media[0]))
          @if($sight->media[0]->type == 'video')
            <div class="box box-medium" style="background-image: url({{ str_replace(["//youtube", "//www.youtube"], "//img.youtube", str_replace("watch?v=","vi/", $sight->media[0]->url . "/0.jpg")) }})">
          @else
            <div class="box box-medium" style="background-image: url({{ $sight->media[0]->url }}); background-size: cover">
          @endif
        @else
          <div class="box box-medium" style="background-image: url({{$sight->logo_url }})">
        @endif
					<div class="news-overlay">
						<div class="news-title">
							<h3>{{ $sight->name }}</h3>
						</div>
						<div class="news-details">
              {{ $sight->address }}
            </div>
				  </div>
				</div>
      </div>
      </a>
    @endforeach
  </div>
</div>
@include('partials.app-promo')
@endsection
