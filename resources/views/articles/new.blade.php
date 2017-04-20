@extends('layouts.app') 

@section("header") 
    @include('partials.header-admin', array('title' => "Artikel aanmaken", 'menu' => false)) 
@endsection 

@section("content")
<div class="container">
    <div class="form-group">
        <label for="article-title">Titel</label>
        <input type="text" class="textbox" id="article-title" placeholder="Typ de titel van het artikel hier">
    </div>

    <div class="form-group">
        <label for="article-text">Tekst</label>
        <textarea id="article-text" class="textbox" id="" cols="30" rows="10" placeholder="Typ hier de teksts van je artikel"></textarea>
    </div>

    <div class="form-group">
        <label>Thumbnail media <span class="label-light">Optioneel</label>
    </div>
</div>
<div class="well">
    <div class="container">
        <div class="row">
            <div class="col-perc-45">
                <div class="form-group">
                    <label for="article-media-link">Media Link</label>
                    <input type="text" id="article-media-link" class="textbox" placeholder="Typ een url naar een afbeelding of een youtube link">
                </div>
            </div>
            <div class="col-perc-10">
                <div class="of">Of</div>
            </div>
            <div class="col-perc-45">
                <div class="form-group">
                    <label for="article-media-link">Media via upload</label>
                    <button class="button--secondary">Upload video of afbeelding</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="form-group">
        <label for="article-category">Categorie</label>
        <select name="article-category" id="article-category">
            <option value="1">Testimonial</option>
            <option value="2">Artikel</option>
            <option value="3">Politiek</option>
        </select>
    </div>
</div>
 
</div>
@endsection