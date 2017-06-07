@extends('layouts.app')

@section("header")
	@include('partials.header')
@endsection

@section("content")
	<div class="container">
		<div class="article">
			<h1>{{ $school->name }}</h1>
		</div>
		{{-- <div class="row">
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
			</div>
		</div> --}}

		{{-- <div class="slider" id="slider-sight">
			<div class="slider-content">
				<div class="slider-item">
					<img src="{{ $school->logo_url }}" style="height:100%;width:auto">
				</div>
			</div>
		</div> --}}

		<div class="article">
			<div class="article-content">
				<p>
					{!! $school->description !!}
				</p>
			</div>		
		</div>

	</div>
	<div class="well well-nomargin fit-footer" id="opleidingen">
		<div class="container">
		<div class="article">
			<div class="row">
				<div class="col-1">
				<h4>Opleidingen</h4>
				<hr />
				@foreach($school->fields as $field)
					<div id="opleidingen-{{ $field->name }}">
						<h2 id='field-name'>{{ $field->name }}</h2>
						<div id='field-description'>{{ $field->description }}</div>
						<br />
						<a href="{{ $field->link }}" class="button--link" target="_blank">Bekijk Opleiding</a>
					</div>
				@endforeach
				<br />
				<br />
			</div>
		</div>
		</div>
		<div class="article">
		<h5>Wil je weten hoe het zou zijn om bij deze school te studeren? Download "Get-a-Life" en beleef het zelf op je smartphone!</h5>
		</div>
	</div>
</div>
@endsection
