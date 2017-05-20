@extends('layouts.app')

@section("header")
  @include('partials.header-titled', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">
	<div class="row">
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste bier gedronken:</h4>
				<ol>
					@foreach($mostBeers as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						{{ $gamer->total_beers_drunk }} pinten
					</li>
					@endforeach
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meest gestudeerd:</h4>
				<ol>
					@foreach($mostStudied as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						{{ $gamer->total_hours_studied }} uren
					</li>
					@endforeach
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste examens gebuisd:</h4>
				<ol>
					@foreach($mostExamsFailed as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						{{ $gamer->total_exams_failed }} examens
					</li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste examens geslaagd:</h4>
				<ol>
					@foreach($mostExamsPassed as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						{{ $gamer->total_exams_passed }} examens
					</li>
					@endforeach
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste geld verzameld:</h4>
				<ol>
					@foreach($mostMoneyCollected as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						€ {{ $gamer->total_money_collected }}
					</li>
					@endforeach
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste geld uitgegeven:</h4>
				<ol>
					@foreach($mostMoneySpent as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						€ {{ $gamer->total_money_spent }}
					</li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meest gesport:</h4>
				<ol>
					@foreach($mostSported as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						{{ $gamer->total_time_sported }} uren
					</li>
					@endforeach
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste cultuur:</h4>
				<ol>
					@foreach($mostCulture as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						{{ $gamer->total_time_culture }} uren
					</li>
					@endforeach
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meest gefeest:</h4>
				<ol>
					@foreach($mostParty as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						{{ $gamer->total_time_party }} uren
					</li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meest in coma:</h4>
				<ol>
					@foreach($mostComa as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						{{ $gamer->total_time_coma }} uren
					</li>
					@endforeach
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste blackouts:</h4>
				<ol>
					@foreach($mostBlackout as $gamer)
					<li>
						@foreach($users as $user)
							@if($user->id === $gamer->user_id)
								<b>{{ $user->firstName . ' ' . substr($user->lastName, 0, 1) . '.: ' }}</b>
							@endif
						@endforeach
						{{ $gamer->total_time_blackout }} keer
					</li>
					@endforeach
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection