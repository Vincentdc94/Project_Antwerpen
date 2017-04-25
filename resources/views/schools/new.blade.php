@extends('layouts.app') 

@section("header") 
    @include('partials.header-admin', array('title' => "Artikel Aanmaken", 'menu' => false)) 
@endsection 

@section("content")
<div class="container">
    <div class="form-group">
        <label for="article-title">Schoolnaam</label>
        <input type="text" class="textbox" id="school-name" placeholder="Typ de naam van de school hier">
    </div>

    <div class="form-group">
        <label for="article-text">Schoolbeschrijving</label>
        <textarea id="school-description" class="textarea" id="school-text" name="school-text" cols="30" rows="15" placeholder="Typ een beschrijving van de school hier"></textarea>
    </div>

    <div class="form-group">
        <label>Campussen</label>
    </div>
</div>
<div class="well">
    <div class="container">
        <button class="button--primary button--big" id="add-campus">
            <i class="fa fa-plus"></i>
        </button>
        <button class="button--secondary button--big" id="campus-id">Campus eerste</button>
        <button class="button--secondary button--big" id="campus-id">Campus tweede</button>
        <button class="button--secondary button--big" id="campus-id">Campus Derde</button>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-perc-25-gt-2"><button class="button--delete button--block gt-20">Verwijderen</button></div>
        <div class="col-perc-25-gt-2"><button class="button--secondary button--block gt-20">Goedkeuren</button></div>
        <div class="col-perc-25-gt-2"><button class="button--secondary button--block gt-20">Opslaan</button></div>
        <div class="col-perc-25-gt-2"><button class="button--primary button--block gt-20">Publiceren</button></div>
    </div>
</div>
 
</div>
@endsection