@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
	<div class="container">

	<form method='POST' id="profile-form" action='/profiel'>
	<input name='_method' type='hidden' value='PATCH'>

		{{ csrf_field() }}

		<input type='hidden' id="user-id" value='{{ Auth::user()->id }}'>
		<div class="row">
			<div class="col-1">
				<h1>Gebruikersdetails</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-2-gt-1">
				<div class='form-group'>
					
					<label for='firstName'>Voornaam:</label>
					<input type='text' class='textbox' id="profile-firstname" name='firstName' value='{{ $user->firstName }}'>
					<label for='lastName'>Achternaam:</label>
					<input type='text' class='textbox' id="profile-lastname" name='lastName' value='{{ $user->lastName }}'>
					<label for='email'>E-mail:</label>
					<input type='text' class='textbox' id="profile-email" name='email' value='{{ $user->email }}'>
					<br><br>
					<button class='button--primary'>Update gegevens</button>
					<a href='/password/reset'><button type='button' class='button--secondary'>Vraag wachtwoord reset aan</button></a>
				</div>
			</div>
			<div class='col-2-gt-1'>
				<div class='form-group float-right'>
					@if(Auth::user()->avatar === "" || Auth::user()->avatar === null)
						<img style='width: 63%' name='avatar' id="avatar-pic" src='https://museum.wales/media/40374/thumb_480/empty-profile-grey.jpg'>
					@else
						<img style='width: 63%' name='avatar' id="avatar-pic" src='{{ $user->avatar }}'>
					@endif
					<label for='avatar'>Gebruikersafbeelding</label>
					<p style="color: red;" id="upload-pic-error"></p>
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
					<h1>Get-a-Life scores</h1>
				</div>
			</div>
				<div class='form-group'>
					<div class='row'>
						<div class='col-3-gt-1'>
							<h3>Tijd gestudeerd</h3>
							<p>{{ 
								$user->gameInfo->total_hours_studied
							}} uur</p>
						</div>
						<div class='col-3-gt-1'>
							<h3>Geld verzameld</h3>
							<p>€ {{
								$user->gameInfo->total_money_collected
							}}</p>
						</div>
						<div class='col-3-gt-1'>
							<h3>Examens geslaagd</h3>
							<p>{{ 
								$user->gameInfo->total_exams_passed
							}} examens</p>
						</div>
					</div>
					<div class='row'>
						<div class='col-3-gt-1'>
							<h3>Tijd gesport</h3>
							<p>{{ 
								$user->gameInfo->total_time_sported
							}} uur</p>
						</div>
						<div class='col-3-gt-1'>
							<h3>Geld uitgegeven</h3>
							<p>€ {{
								$user->gameInfo->total_money_spent
							}}</p>
						</div>
						<div class='col-3-gt-1'>
							<h3>Examens gebuisd</h3>
							<p>{{ 
								$user->gameInfo->total_exams_failed
							}} examens</p>
						</div>
					</div>
					<div class='row'>
						<div class='col-3-gt-1'>
							<h3>Tijd cultuur</h3>
							<p>{{ 
								$user->gameInfo->total_time_culture
							}} uur</p>
						</div>
						<div class='col-3-gt-1'>
							<h3>Bier gedronken</h3>
							<p>{{
								$user->gameInfo->total_beers_drunk
							}} pintjes</p>
						</div>
						<div class='col-3-gt-1'>
							<h3>Aantal blackouts</h3>
							<p>{{ 
								$user->gameInfo->total_time_blackout
							}}</p>
						</div>
					</div>
					<div class='row'>
						<div class='col-3-gt-1'>
							<h3>Tijd gefeest</h3>
							<p>{{ 
								$user->gameInfo->total_time_party
							}} uur</p>
						</div>
						<div class='col-3-gt-1'>
							<h3>Tijd in coma</h3>
							<p>{{
								$user->gameInfo->total_time_coma
							}} uur</p>
						</div>
					</div>
			</div>
	</div>
@endsection
