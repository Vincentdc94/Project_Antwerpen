@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Registreer"))
@endsection

@section("content")
<div class="container">

	<h1>Registreer</h1>

	<form method='post' id="register" action='/registreer'>
		
		{{ csrf_field() }}

		<div class='form-group'>
			<label for='firstName'>Voornaam</label>
			<input type='text' class='textbox' id='name' name='firstName'>
			<label for='lastName'>Achternaam</label>
			<input type='text' class='textbox' id='lastName' name='lastName'>
		</div>

		<div class='form-group'>
			<label for='email'>E-mail</label>
			<input type='email' class='textbox' id='email' name='email'>
		</div>

		<div class='form-group'>
			<label for='password'>Wachtwoord</label>
			<input type='password' class='textbox' id='password' name='password'>
			<label for='password_confirmation'>Wachtwoord bevestiging</label>
			<input type='password' class='textbox' id='password_confirmation' name='password_confirmation'>
		</div>

		<div class='form-group'>
			<input type='submit' class='button--primary' value="Registreer"/>
		</div>

	</form>

</div>
@endsection
