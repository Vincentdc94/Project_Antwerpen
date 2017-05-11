@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">
	<h1>Login</h1>

	<form method='post' action='login'>

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
			<button type='submit' class='button--primary'>Log in</button>
			<a class="float-right" href="/password/reset">Wachtwoord vergeten?</a>
		</div>

	</form>
</div>
@endsection
