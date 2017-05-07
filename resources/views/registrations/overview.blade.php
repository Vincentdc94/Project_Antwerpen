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
				<form method='POST' action=''>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->firstName . ' ' . $user->lastName }}</td>
						<td>
							<select>
								@foreach($roles as $role)
									<option 
									@if($role->id === $user->role_id) 
										selected 
									@endif>{{ $role->name }}</option>
								@endforeach
							</select>
						</td>
						<td>{{ $user->created_at }}</td>
					</tr>
				@endforeach
				</form>
			</tbody>
		</table>
	</div>

  </div>
@endsection