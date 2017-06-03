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
	<div class="well well-nomargin fit-footer">
		<div class="container">
		<div class="article">
			<div class="row">
				<div class="col-1">
					{{--<h4>Campussen</h4>
					<hr />
					<h2 id="campus-title">{{ $school->campi[0]->name}}</h2>
					<div id="campus-description">{{ $school->campi[0]->description}}</div>

					<h4>Contact</h4>
					<hr />
					<h3 id="campus-contact-title">{{ $school->campi[0]->name}}</h3>
					<div class="form-group">
						<div id="campus-contact-adres">{{ $school->campi[0]->contact->address }}</div>
						<div id="campus-contact-email">{{ $school->campi[0]->contact->email }}</div>
						<div id="campus-contact-tel">{{ $school->campi[0]->contact->tel }}</div>
					</div>
				</div>
				<div class="col-perc-40-gt-30">
					<div class="row" id="campus-holder">
						@foreach($school->campi as $campus)
							<div class="campus-holder-item" id="campus-holder-{{ $campus->id }}">
								<button class="button--secondary button--block" id="campus-{{ $campus->id }}">{{ $campus->name }}</button>
								<input type="hidden" id="campus-item-title" value="{{ $campus->name }}">
								<input type="hidden" id="campus-item-description" value="{{ 'Description placeholder' }}">
								<input type="hidden" id="campus-contact-item-adres" value="{{ $campus->contact->address }}">
								<input type="hidden" id="campus-contact-item-email" value="{{ $campus->contact->email }}">
								<input type="hidden" id="campus-contact-item-tel" value="{{ $campus->contact->tel }}">
							</div>
						@endforeach
					</div>
				</div>--}}
				<h4>Opleidingen</h4>
				<hr />
				@foreach($school->fields as $field)
					<h2 id='field-name'>{{ $field->name }}</h2>
					<div id='field-description'>{{ $field->description }}</div>
					<br />
					<a href="{{ $field->link }}" class="button--link" target="_blank">Bekijk Opleiding</a>
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
