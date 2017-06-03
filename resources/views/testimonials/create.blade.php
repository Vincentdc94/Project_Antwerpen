@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Getuigenis aanmaken", 'menu' => false, 'url_back' => '/getuigenissen'))
@endsection

@section("content")
  <div class="container">
    <form method='post' id="article-create-form" action='/getuigenissen' enctype='multipart/form-data'>

    {{ csrf_field() }}

    @include('layouts.errors')

      <div class="form-group">
        <label for="testimonial-title">Titel</label>
        <input type="text" class="textbox" name='testimonial-title' id="article-title" placeholder="Typ hier de titel van je getuigenis.">
      </div>

      <div class="form-group">
        <label for="testimonial-body">Tekst</label>
        <textarea id="testimonial-body" class="richtext textarea" name="testimonial-body" cols="30" rows="20" placeholder="Typ hier de tekst van je getuigenis"></textarea>
      </div>

      <br />
    </div>

    <div class="container">
      <label for="media-link">Definieer hier de media als placeholder</label>
    </div>
    <div class="well">
      <div class="container">
        @include('partials.singlemedia')
      </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-perc-25-gt-2"><button type='submit' class="button--primary button--block gt-20" id="testimonial-publish">Publiceren</button></div>
        </div>
    </div>
  </form>
</div>
@endsection
