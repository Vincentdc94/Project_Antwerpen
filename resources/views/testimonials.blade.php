@extends('layouts.app')

@section("header")
  @include('partials.header-titled', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
  <button class="button--primary">Elle moe</button>
  <button class="button--secondary">Elle va</button>
@endsection
