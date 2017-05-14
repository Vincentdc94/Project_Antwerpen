@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">

	<h1>Registreer</h1>

	<form method='post' action='/registreer'>
		
		{{ csrf_field() }}

		<div class='form-group'>
			<label for='firstName'>Voornaam</label>
			<input type='text' class='textbox' id='name' name='firstName' required>
			<label for='lastName'>Achternaam</label>
			<input type='text' class='textbox' id='lastName' name='lastName' required>
		</div>

		<div class='form-group'>
			<label for='email'>E-mail</label>
			<input type='email' class='textbox' id='email' name='email'>
		</div>

		<div class='form-group'>
			<label for='password'>Paswoord</label>
			<input type='password' class='textbox' id='password' name='password' required>
			<label for='password_confirmation'>Paswoord bevestiging</label>
			<input type='password' class='textbox' id='password_confirmation' name='password_confirmation' required>
		</div>

		<div class='form-group'>
			<button type='submit' class='button--primary'>Registreer</button>
		</div>

		@include('layouts.errors')

	</form>

</div>
@endsection
