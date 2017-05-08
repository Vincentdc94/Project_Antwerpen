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
					<th></th>
				</tr>
			</thead>  
			<tbody>
				@foreach($users as $user)
				<form method="POST" action="/admin/gebruikers/{{ $user->id }}">
				<input name="_method" type="hidden" value="PATCH">
				{{ csrf_field() }}
					<tr>
						<td>{{ $user->firstName . ' ' . $user->lastName }}</td>
						<td>
							<select name="user-new-role">
								@foreach($roles as $role)		
									@if($role->id === $user->role_id) 
										<option value="{{$role->id}}" selected="selected">{{ $role->name }}</option>
									@else
										<option value="{{$role->id}}">{{ $role->name }}</option>
									@endif
								@endforeach
							</select>
						</td>
						<td>{{ $user->created_at }}</td>
						<td>
                            <button type="submit">
                                <i class="fa fa-floppy-o"></i>
                            </button>
						</td>
					</tr>
				</form>
				@endforeach	
			</tbody>
		</table>
	</div>
  </div>
@endsection