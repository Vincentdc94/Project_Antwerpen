@extends('layouts.app')

@section("header")
    @include('modals.campus')
    @include('partials.header-admin', array('title' => "School bewerken", 'menu' => false))
@endsection

@section("content")

<div class="container">
<form method='post' action='/admin/scholen/{{ $school->id }}'>
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

    {{--<div class="form-group">
        <label>Campussen</label>
    </div>
</div>
<div class="well">
    <div class="container row">
        <button class="button--primary button--big float-left" id="modal-campus-open">
            <i class="fa fa-plus"></i>
        </button>
        <div id="campussen-holder" class="float-left">

        </div>
    </div>
</div>--}}

    <div class="form-group">
        <label>Opleidingen</label>
    </div>
</div>
<div class="well">
    <div class="container row">
        <button class="button--primary button--big float-left" id="modal-campus-open">
            <i class="fa fa-plus"></i>
        </button>
        <div id="campussen-holder" class="float-left">

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-perc-25-gt-2"><button class="button--delete button--block gt-20">Verwijderen</button></div>
        <div class="col-perc-25-gt-2"><button type='submit' class="button--primary button--block gt-20">Opslaan</button></div>
    </div>
</div>
</form>

</div>
@endsection