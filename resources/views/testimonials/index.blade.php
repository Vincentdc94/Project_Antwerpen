	@extends('layouts.app')

@section("header")
  @include('partials.header-titled', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">
	<h1>Getuigenissen index</h1>
	<ul>
	@foreach($testimonials as $testimonial)
		<li>
			<b>Titel:</b> {{ $testimonial->title }}<br>
			<b>Body:</b> {{ $testimonial->body }}<br>
			<b>Schrijver:</b> {{ $testimonial->author->firstName . ' ' . $testimonial->author->lastName}}<br>
			<b>Approved:</b> {{ $testimonial->approved }}<br>
			<b>Front page:</b> {{ $testimonial->frontPage }}<br>
			<b>Timestamp:</b> {{ $testimonial->created_at->toFormattedDateString() }}
		</li>
	@endforeach
	</ul>
</div>
@endsection
