@extends('layouts.empty')

@section('content')

<div class="content" id="tim">
  <div class="content-overlay" id="content-overlay"></div>
  <div class="content-overlay" id="content-overlay-2"></div>
  <div class="content-overlay" id="content-overlay-3">

    <div class="content-holder">
      <div class="content-title" id="content-title">Antwarpe</div>
      <div class="content-subtitle" id="content-subtitle">De Schoonste studentenstad</div>
      <p id="start">
        <button class="button--experience--primary" id="start-experience">Begin introductie</button>
        <a class="button--experience" href="/" id="go-website">Bezoek Website</a>
      </p>
      <p class="hide end" id="end">
        <a href="{{ url('/') }}" class="button--experience">Ontdek Meer op de site</a>
      </p>
    </div>
  </div>
  <img src="" class="hide content-image" id="content-image" alt="Slide image">
</div>

@endsection

{{-- <div id="start" class="start align-center">
      <button class="button--experience" id="start-experience">Start Introductie</button>
    </div>

    <div class="tim">

    </div>

    <div class="balloon" id="balloon-1">
      Hey ik ben Tim en ik heet je welkom in Antwerpen toekomstige student!
    </div>

    <div class="images-holder" id="images-1">
      <img src="./images/bezienswaardigheden/groenplaats.jpg" class="t-image" alt="Foto van de groenplaats">
      <img src="./images/bezienswaardigheden/kathedraal.jpg" class="t-image" alt="Foto van de kathedraal">
      <img src="./images/bezienswaardigheden/mas.jpg" class="t-image" alt="Foto van het mas">
    </div>

    <div class="image-presentation" id="image-presentation-1"></div> --}}