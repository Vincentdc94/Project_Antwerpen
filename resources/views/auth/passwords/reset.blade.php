@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section('content')
<div class="container">
    <div class="row">
        <h1>Reset Wachtwoord</h1>
            <form method="POST" action="{{ route('password.request') }}">

                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email">E-Mailadres</label>
                    <input id="email" type="email" class="textbox" name="email" 
                    @if(Auth::check())
                        value="{{ Auth::user()->email }}"
                    @endif
                     autofocus required>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Nieuw wachtwoord</label>
                    <input id="password" type="password" class="textbox" name="password" required>
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Bevestig Wachtwoord</label>
                    <input id="password-confirm" type="password" class="textbox" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    <button class="button--primary">
                        Verander wachtwoord
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
