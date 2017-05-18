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
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meest gestudeerd:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste examens gebuisd:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste examens geslaagd:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste geld verzameld:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste geld uitgegeven:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meest gesport:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste cultuur:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meest gefeest:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meest in coma:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
		<div class="col-3-gt-1">
			<div class="form-group">
				<h4>Meeste blackouts:</h4>
				<ol>
					@for($i = 0; $i < 5; $i++)
					<li>
						{{ 'Gebruiker: ' }}
						{{ 'score' }}
					</li>
					@endfor
				</ol>
			</div>
		</div>
	</div>
</div>
@endsection