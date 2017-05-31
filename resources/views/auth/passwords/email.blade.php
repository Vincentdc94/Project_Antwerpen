@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">
    <h1>Verander wachtwoord</h1>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
        
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">E-Mail adres:</label>
            <input id="email" type="email" class="textbox" name="email"
                @if(Auth::check()) 
                    value="{{ Auth::user()->email }}"
                @endif
            >
        </div>

        <div class="form-group">
            <button class="button--primary">
                Stuur wachtwoord reset link
            </button>
        </div>
    </form>
</div>
@endsection
