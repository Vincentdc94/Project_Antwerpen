@extends('layouts.app')

@section("header")
    @include('modals.mediabrowser')
    @include('partials.header-admin', array('title' => "Bezienswaardigheid Bewerken", 'menu' => false, 'url_back' => '/admin/bezienswaardigheden/overzicht'))
@endsection

@section("content")

<div class="container">
<form method='post' action='/admin/bezienswaardigheden/{{ $sight->id }}'>

    {{ csrf_field() }}

    @include('layouts.errors')
    <input type="hidden" id="sight-id" value="{{ $sight->id }}">
    <div class="form-group">
        <label for="sight-name">Naam Bezienswaardigheid</label>
        <input type="text" class="textbox" name="sight-name" id="sight-name" value='{{ $sight->name }}'>
    </div>

    <div class="form-group">
        <label for="sight-description">Beschrijving bezienswaardigheid</label>
        <textarea id="sight-description" class="richtext textarea" id="sight-description" name="sight-description" cols="30" rows="15">{{ $sight->description }}</textarea>
    </div>

    <div class='form-group'>
    	<label for='sight-address'>Adres:</label>
    	<input type='text' class='textbox' name='sight-address', id='sight-address', value='{{ $sight->address }}'>
    </div>
    <div class='form-group'>
    	<label for='sight-email'>E-mail:</label>
    	<input type='email' class='textbox' name='sight-email', id='sight-email', value='{{ $sight->email }}'>
    </div>
    <div class='form-group'>
    	<label for='sight-tel'>Telefoonnummer:</label>
    	<input type='text' class='textbox' name='sight-tel', id='sight-tel', value='{{ $sight->tel }}'>
    </div>
</div>

@include('partials.media')

<div class="container">
    <div class="row">
        <div class="col-perc-25-gt-2"><a id="edit-sight" class="button--primary button--block gt-20">
        Opslaan</a></div>
    </div>
</div>
</form>

</div>
@endsection
