@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
	<div class="container">

	<form method='POST' action='/profiel'>
	<input name='_method' type='hidden' value='PATCH'>

		{{ csrf_field() }}

		<input type='hidden' id="user-id" value='{{ Auth::user()->id }}'>
		<div class="row">
			<div class="col-2-gt-1">
				<div class='form-group'>
					<h1>Gebruikersdetails</h1>
					<label for='new_firstName'>Voornaam:</label>
					<input type='text' class='textbox' name='new_firstName' value='{{ $user->firstName }}'>
					<label for='new_lastName'>Achternaam:</label>
					<input type='text' class='textbox' name='new_lastName' value='{{ $user->lastName }}'>
					<label for='new_email'>E-mail:</label>
					<input type='email' class='textbox' name='new_email' value='{{ $user->email }}'>
					<br><br>
					<button class='button--primary'>Update gegevens</button>
					{{--<button type='submit' class='button--primary'>Update</button>--}}
				</div>
			</div>
			<div class='col-2-gt-1'>
				<div class='form-group'>
					@if(Auth::user()->avatar === "" || Auth::user()->avatar === null)
						<img style='width: 50%' name='avatar' id="avatar-pic" src='https://museum.wales/media/40374/thumb_480/empty-profile-grey.jpg'>
					@else
						<img style='width: 50%' name='avatar' id="avatar-pic" src='{{ $user->avatar }}'>
					@endif
					<label for='avatar'>Gebruikersafbeelding</label>
					<p class="error" id="upload-pic-error"></p>
					<div class="button--secondary upload-holder">
						<div class="upload-value" id="upload-value">Upload Profielafbeelding</div>
						<input type="file" class="upload" id="profile-pic-file"/>
					</div>
				</div>
			</div>
		</div>
	</form>
		<div class='row'>
			<div class='col-2-gt-1'>
				<div class='form-group'>
					<h1>Wachtwoord veranderen</h1>
					{{--<label for='old_password'>Oud wachtwoord:</label>
					<input type='password' class='textbox' name='old_password' placeholder='Typ hier je oud wachtwoord'>
					<label for='new_password'>Nieuw wachtwoord:</label>
					<input type='password' class='textbox' name='new_password' placeholder='Typ hier je nieuw wachtwoord'>
					<label for='new_password_confirmation'>Nieuw wachtwoord bevestigen:</label>
					<input type='password' class='textbox' name='new_password_confirmation' placeholder='Typ opnieuw je nieuw wachtwoord'>
					<br><br>--}}
					<a href='/password/reset'><button type='button' class='button--primary'>Vraag wachtwoord reset aan</button></a>
				</div>
			</div>
			<div class='col-2-gt-1'>
				<div class='form-group'>
					<h1>Get-a-Life scores</h1>
					<div class='row'>
						<div class='col-2-gt-1'>
							<h2>{{ 'STUDIEPUNTEN' }}</h2>
							<p>{{ 
								$user->gameInfo->studiepunten
								/*'180'*/
							}}</p>
						</div>
						<div class='col-2-gt-1'>
							<h2>{{ 'PLEZIER' }}</h2>
							<p>{{
								$user->gameInfo->plezier
								/*'51.28'*/
							}}</p>
						</div>
					</div>
					<div class='row'>
						<div class='col-2-gt-1'>
							<h2>{{ 'CULTUUR' }}</h2>
							<p>{{ 
								$user->gameInfo->cultuur
								/*'88.02'*/
							}}</p>
						</div>
						<div class='col-2-gt-1'>
							<h2>{{ 'GEZONDHEID' }}</h2>
							<p>{{
								$user->gameInfo->gezondheid
								/*'14.99'*/
								}}</p>
						</div>
					</div>
			</div>
		</div>
	</div>
@endsection
