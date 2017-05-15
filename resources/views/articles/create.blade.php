@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Artikel aanmaken", 'menu' => false, 'url_back' => '/admin/artikels/overzicht'))
@endsection

@section("content")

@include('layouts.errors')

<form method="POST" action="/admin/artikels" enctype='multipart/form-data'>
{{ csrf_field() }}
  <div class="container">
  
  @include('layouts.errors')

      <div class="form-group">
        <label for="article-title">Titel</label>
        <input type="text" class="textbox" name="article-title" id="article-title" placeholder="Typ de titel van het artikel hier">
      </div>

      <div class="form-group">
        <label for="article-text">Tekst</label>
        <textarea id="article-text" class="richtext textarea" id="article-text" name="article-text" cols="30" rows="20" placeholder="Typ hier de teksts van je artikel"></textarea>
      </div>

      <br />

      <div class="form-group">
        <label for="category">Categorie</label>
        <select class="select" name="category" id="article-category">
          @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    @include('partials.singlemedia')

    <div class="container">
        <div class="row">
            <div class="col-perc-25-gt-2"><button type='submit' class="button--primary button--block gt-20" id="article-publish">Publiceren</button></div>
        </div>
    </div>
</div>
</form>
@endsection
