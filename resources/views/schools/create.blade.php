@extends('layouts.app')

@section("header")
    @include('modals.campus')
    @include('partials.header-admin', array('title' => "Artikel Aanmaken", 'menu' => false))
@endsection

@section("content")

<div class="container">
<form method='post' action='/scholen'>

    {{ csrf_field() }}

    <div class="form-group">
        <label for="school-name">Schoolnaam</label>
        <input type="text" class="textbox" name="school-name" id="school-name" placeholder="Typ de naam van de school hier">
    </div>

    <div class="form-group">
        <label for="school-description">Schoolbeschrijving</label>
        <textarea id="school-description" class="richtext textarea" id="school-description" name="school-description" cols="30" rows="15" placeholder="Typ een beschrijving van de school hier"></textarea>
    </div>

    <div class="form-group">
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
</div>
<div class="container">
    <div class="row">
        <div class="col-perc-25-gt-2"><button class="button--delete button--block gt-20">Verwijderen</button></div>
        <div class="col-perc-25-gt-2"><button class="button--secondary button--block gt-20">Goedkeuren</button></div>
        <div class="col-perc-25-gt-2"><button class="button--secondary button--block gt-20">Opslaan</button></div>
        <div class="col-perc-25-gt-2"><button type='submit' class="button--primary button--block gt-20">Publiceren</button></div>
    </div>
</div>
</form>

</div>
@endsection
