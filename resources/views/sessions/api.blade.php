
@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Api beheer"))
@endsection

@section("content")
<div class="container">


    <div class="form-group">
        <label for="token">Api Token</label>
        <input type="text" class="textbox" id="token">
    </div>
    <div class="form-group">
        <input type="submit" class="button--primary">
    </div>
    

@endsection