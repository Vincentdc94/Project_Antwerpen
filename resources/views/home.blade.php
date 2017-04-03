@extends('layouts.app')

@section('content')
    <div id="experience">
      <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="Stan Logo" height="80">
      </div>

      <div class="content">

        <div id="start" class="start align-center">
          <button class="button-experience" id="start-experience">Start Introductie</button>
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

        <div class="image-presentation" id="image-presentation-1"></div>
      </div>
    </div>
@endsection
