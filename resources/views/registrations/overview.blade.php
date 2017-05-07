@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Gebruikers Overzicht", 'menu' => false))
@endsection

@section("content")
  <div class="container">
	<h4>Gebruikers overzicht</h4>
		<div class="table-holder">
			<table>
			<thead>
				<tr>
					<th>Naam</th>
					<th>Rol</th>
					<th>Tijdstip registratie</th>
				</tr>
			</thead>  
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->firstName . ' ' . $user->lastName }}</td>
						<td>{{ $user->role_id }}</td>
						<td>{{ $user->created_at }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

  </div>
@endsection