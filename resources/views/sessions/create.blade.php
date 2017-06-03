@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">
{{-- 
	@if(session('message'))
		<h3>{{ session('message') }}</h3>
	@endif --}}

	<h1>Login</h1>

	<form method='post' id="login" action='login'>

		{{ csrf_field() }}

		@include('layouts.errors')

		<div class='form-group'>
			<label for='email'>E-mail:</label>
			<input type='email' class='textbox' name='email' id='email'>
		</div>
		<div class='form-group'>
			<label for='password'>Wachtwoord:</label>
			<input type='password' class='textbox' name='password' id='password'>
		</div>
		<div class='form-group'>
			<input type='submit' class='button--primary' value="Log in"/>
			<a class="float-right" href="/password/reset">Wachtwoord vergeten?</a>
		</div>

	</form>
</div>
@endsection
