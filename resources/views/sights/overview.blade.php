@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Scholen Overzicht", 'menu' => false))
@endsection

@section("content")
  <div class="container">
		<a href="{{ url('admin/bezienswaardigheden/maken') }}" class="button--primary">Nieuwe Bezienswaardigheid</a>
		<h4>Bezienswaardigheden overzicht</h4>
		<div class="table-holder">
			<table>
			<thead>
				<tr>
					<th>Naam</th>
				</tr>
			</thead>  
			<tbody>
				@foreach($sights as $sight)
					<tr>
						<td>{{ $sight->name }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

  </div>
@endsection