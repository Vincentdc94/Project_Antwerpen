@extends('layouts.app')

@section("header")
	@include('partials.header')
@endsection

@section("content")
	<div class="container">
		<h1>{{ $testimonial->title }}</h1>
		<h5>
			{{ $testimonial->author->firstName . ' ' . $testimonial->author->lastName }},
			{{ $testimonial->created_at->diffForHumans() }}
		</h5>
		<div class="row">
		{{-- ALS ER MEDIA IS
			<div class="slider" id="slider-sight">
				<div class="slider-previous" id="slide-previous">
					<i class="fa fa-chevron-left"></i>
				</div>
				<div class="slider-content">
					<div class="slider-item"><img src="{{ asset('images/hero.jpg') }}" alt="Hero image"></div>
					<div class="slider-item"><img src="{{ asset('images/angled_dag.png') }}" alt="Angled Dag"></div>
					<div class="slider-item"><img src="{{ asset('images/google-play-badge.png') }}" alt="Google Play Badge"></div>
				</div>
				<div class="slider-next" id="slide-next">
					<i class="fa fa-chevron-right"></i>
				</div>
			</div> --}}
		</div>


		<div class="article-content">
			<p>
				{{ $testimonial->body }}
			</p>
		</div>
	</div>
</div>
@endsection
