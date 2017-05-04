@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">

	<h1>Registreer</h1>

	<form method='post' action='/registreer'>
		
		{{ csrf_field() }}

		<label for='firstName'>Voornaam</label>
		<input type='text' id='name' name='firstName' required>


		<label for='lastName'>Achternaam</label>
		<input type='text' id='lastName' name='lastName' required>

		<label for='email'>E-mail</label>
		<input type='email' id='email' name='email'>	

		<label for='password'>Paswoord</label>
		<input type='password' id='password' name='password' required>

		<label for='password_confirmation'>Paswoord bevestiging</label>
		<input type='password' id='password_confirmation' name='password_confirmation' required>
		<br>

		<button type='submit'>Registreer</button>

		@include('layouts.errors')

	</form>

</div>
@endsection
