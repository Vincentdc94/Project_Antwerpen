@extends('layouts.app')

@section("header")
    @include('modals.campus')
    @include('partials.header-admin', array('title' => "Bezienswaardigheid Bewerken", 'menu' => false))
@endsection

@section("content")

<div class="container">
<form method='post' action='/admin/bezienswaardigheden/{{ $sight->id }}'>
<input name='_method' type='hidden' value='PATCH'>

    {{ csrf_field() }}

    @include('layouts.errors')

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
        <div class="col-perc-25-gt-2"><button formmethod='post' formaction='/admin/bezienswaardigheden/{{ $sight->id }}' type='submit' class="button--delete button--block gt-20">Verwijderen</button><input name='_method' type='hidden' value='DELETE'></div>
        
        <div class="col-perc-25-gt-2"><button type='submit' class="button--primary button--block gt-20">
        Opslaan</button></div>
    </div>
</div>
</form>

</div>
@endsection