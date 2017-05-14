@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Getuigenis bewerken", 'menu' => false))
@endsection

@section("content")
  <div class="container">
    <form method='post' action='/admin/getuigenissen/{{ $testimonial->id }}'>
    <input name="_method" type="hidden" value="PATCH">

    {{ csrf_field() }}

    @include('layouts.errors')

      <div class="form-group">
        <label for="testimonial-title">Titel</label>
        <input type="text" class="textbox" name='testimonial-title' id="testimonial-title" value="{{ $testimonial->title }}">
      </div>

      <div class="form-group">
        <label for="testimonial-body">Tekst</label>
        <textarea id="testimonial-body" class="richtext textarea" name="testimonial-body" cols="30" rows="20">{{ $testimonial->body }}</textarea>
      </div>
    </div>

    @include('partials.media')

    <div class="container">
        <div class="row">
            <div class="col-perc-25-gt-2"><button type='submit' class="button--primary button--block gt-20" id="testimonial-publish">Opslaan</button></div>
        </div>
    </div>
  </form>
</div>
@endsection
