@extends('layouts.empty')

@section('content')

<div class="content">
  <div class="content-overlay" id="content-overlay"></div>
  <div class="content-overlay" id="content-overlay-2"></div>
  <div class="content-overlay" id="content-overlay-3">

    <div class="content-holder">
      <div class="content-title" id="content-title">Antwarpe</div>
      <div class="content-subtitle" id="content-subtitle">De Schoonste studentenstad</div>
      <p>
        <button class="button--experience" id="start-experience">Begin introductie</button>
      </p>
    </div>
  </div>
  <img src="{{ asset('images/hero.jpg') }}" alt="le mas">
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