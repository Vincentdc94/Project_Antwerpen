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
				<input name="_method" type="hidden" value="PATCH">
				{{ csrf_field() }}
					<tr>
						<td>{{ $user->firstName . ' ' . $user->lastName }}</td>
						<td>
							<select id="user-new-role-{{ $user->id }}" class="user-new-role select" data-user-id="{{ $user->id }}">
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
              <button type="submit" id="user-new-role-submit-{{ $user->id }}" class="user-new-role-submit button--secondary button--rect">
                <i class="fa fa-floppy-o"></i>
              </button>
						</td>
					</tr>
				@endforeach	
			</tbody>
		</table>
	</div>
  </div>
@endsection