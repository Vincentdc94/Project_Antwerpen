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
      <textarea id="article-text" class="richtext textarea" id="article-text" name="article-text" cols="30" rows="20" placeholder="Typ hier de teksts van je artikel"></textarea>
    </div>
  </div>

  @include('partials.media')

  <div class="container">

    <div class="form-group">
      <label for="article-category">Categorie</label>
      <select name="article-category" id="article-category">
        <option>Getuigenis</option>
        <option>Artikel</option>
        <option>Politiek</option>
      </select>
    </div>

  </div>




</div>
@endsection
