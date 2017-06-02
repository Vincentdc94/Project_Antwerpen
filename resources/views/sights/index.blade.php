@extends('layouts.app')

@section("header")
  @include('partials.header-titled', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">
	@foreach($sights as $sight)
		<div class="row">
			<div class="col-perc-60-gt-30">
            <a href="{{ url('/bezienswaardigheden/' . $sight->id) }}" class="nodecoration">
            <div class="news-item box-large">
                @if(isset($sight->media[0])) 
                    @if($sight->media[0]->type == 'video')
                        <img src="{{ str_replace(["//youtube", "//www.youtube"], "//img.youtube", str_replace("watch?v=","vi/", $sight->media[0]->url . "/0.jpg")) }}" class="news-image" alt="Hero image">
                    @else
                        <img src="{{ $sight->media[0]->url }}" class="news-image" alt="Hero image">
                    @endif
                @else
                    <img src="none" class="news-image" alt="Hero image">
                @endif
                <div class="news-overlay">
                    <div class="news-title">
                        <h3>{{ $sight->name }}</h3>
                    </div>
                    <div class="news-button">Bekijk</div>
                    <div class="news-details">
                    	<div class="news-author">{{ $sight->address }}</div>
                    	<div class="news-date">{{ $sight->email }}</div>
                    </div>
                </div>
            </div>
            </a>
		</div>
	@endforeach
</div>
@endsection
