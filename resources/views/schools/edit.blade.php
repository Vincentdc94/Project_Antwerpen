@extends('layouts.app')

@section("header")
    @include('modals.opleiding')
    @include('partials.header-admin', array('title' => "School bewerken", 'menu' => false, 'url_back' => '/admin/scholen/overzicht'))
@endsection

@section("content")

<div class="container">

<input name='_method' type='hidden' value='PATCH'>

    {{ csrf_field() }}

    @include('layouts.errors')

    <div class="form-group">
        <label for="school-name">Schoolnaam</label>
        <input type="text" class="textbox" name="school-name" id="school-name" value='{{ $school->name }}'>
    </div>

    <div class="form-group">
        <label for="school-description">Schoolbeschrijving</label>
        <textarea id="school-description" class="richtext textarea" id="school-description" name="school-description" cols="30" rows="15">{{ $school->description }}</textarea>
    </div>

    <div class="form-group">
        <label>Opleidingen</label>
    </div>
</div>

<div class="well">
    <div class="container row">
        <a class="button--primary button--big float-left" id="modal-opleiding-open">
            <i class="fa fa-plus"></i>
        </a>
        <div id="opleidingen-holder" class="float-left" data-school-id="{{ $school->id }}"></div>
        <div id="opleidingen-inputs-holder" class="hidden"></div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-perc-25-gt-2"><button class="button--delete button--block gt-20">Verwijderen</button></div>
        <div class="col-perc-25-gt-2"><button type='submit' class="button--primary button--block gt-20" id="edit-school">Opslaan</button></div>
    </div>
</div>


</div>
@endsection
