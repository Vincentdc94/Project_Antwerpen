@extends('layouts.app')

@section("header")
    @include('partials.header-admin', array('title' => "Link bewerken", 'menu' => false, 'url_back' => '/admin/links/overzicht'))
@endsection

@section("content")

<div class="container">
<form method="POST" action="/admin/links/{{ $link->id }}">
<input name='_method' type='hidden' value='PATCH'> 

	{{ csrf_field() }}

	@include('layouts.errors')

	<div class="form-group">
		<label for="link-name">Naam link:</label>
		<input type="text" class="textbox" name="link-name" id="link-name" value="{{ $link->name }}">
	</div>

	<div class="form-group">
		<label for="link-url">URL link:</label>
		<input type="text" class="textbox" name="link-url" id="link-url" value="{{ $link->url }}">
	</div>

	<div class="form-group">
		<label for="link-desc">Link beschrijving</label>
		<textarea id="link-desc" class="richtext textarea" name="link-desc">{{ $link->description }}</textarea>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-perc-25-gt-2"><button type="submit" class="button--primary button--block gt-20">Opslaan</button></div>
	</div>
</div>

@endsection