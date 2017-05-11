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
    <div class="col-perc-60-gt-30">
      <h2>Antwerpen De studentenstad</h2>

      <iframe class="video" src="{{ str_replace("watch?v=","embed/", $testimonial->media[0]->url) }}" width="650" height="450"></iframe>
    
    </div>
    <div class="col-perc-40-gt-30">
      <h2>Nieuws</h2>
      @foreach($articles as $article)
        <div class="box box-margin">
          <div class="box-content">
            <div class="box-title"> 
              <h3>{{ $article->title }}</h3>
            </div>
            <p>{!! str_limit($article->body, 50, '...') !!}</p>
          </div>
          <div class="box-details align-right">
            <a href="{{ url('/artikels/' . $article->id) }}">Lees Meer...</a>
          </div>
        </div>
      @endforeach
      <div class="align-center">
        <a class="label-light" href="{{ url('/nieuws') }}">Meer Nieuws</a>
      </div>
    </div>
  </div>
  <h2>Scholen</h2>
  <div class="row">
    @foreach($schools as $school)
      <a href="{{ url('/scholen/' . $school->id) }}" class="nodecoration">
      <div class="col-3-gt-1">
        @if($school->media)
          <div class="box box-medium" style="background-image: url({{ $school->media[0]->url }}); background-size: cover">
        @else
          <div class="box box-medium">
        @endif
					<div class="news-overlay">
						<div class="news-title">
							<h2 class="no-margin">{{ $school->name }}</h2>
						</div>
						<div class="news-details"></div>
				  </div>
				</div>
      </div>
      </a>
    @endforeach
  </div>
</div>
@endsection
