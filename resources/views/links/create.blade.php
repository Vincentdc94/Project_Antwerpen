@extends('layouts.app')

@section("header")
    @include('partials.header-admin', array('title' => "Link aanmaken", 'menu' => false, 'url_back' => '/admin/links/overzicht'))
@endsection

@section("content")

<div class="container">
<form method="POST" action="/admin/links">

	{{ csrf_field() }}

	@include('layouts.errors')

	<div class="form-group">
		<label for="link-name">Naam link:</label>
		<input type="text" class="textbox" name="link-name" id="link-name" placeholder="Typ de naam van de link hier.">
	</div>

	<div class="form-group">
		<label for="link-url">URL link:</label>
		<input type="text" class="textbox" name="link-url" id="link-url" placeholder="Plak hier de URL naar de website.">
	</div>

	<div class="form-group">
		<label for="link-desc">Link beschrijving</label>
		<textarea id="link-desc" class="richtext textarea" name="link-desc"></textarea>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-perc-25-gt-2"><button type="submit" class="button--primary button--block gt-20">Publiceren</button></div>
	</div>
</div>

@endsection