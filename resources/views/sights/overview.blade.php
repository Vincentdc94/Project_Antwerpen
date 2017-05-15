@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Scholen Overzicht", 'menu' => false, 'url_back' => '/admin'))
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
					<th></th>
					<th></th>
				</tr>
			</thead>  
			<tbody>
			<form method="POST" action="/admin/bezienswaardigheden">
        <input name="_method" type="hidden" value="DELETE">
        {{ csrf_field() }}
				@foreach($sights as $sight)
					<tr>
						<td>{{ $sight->name }}</td>
						<td>
							<a href="{{ url('/admin/bezienswaardigheden/' . $sight->id . '/bewerken') }}">
                <button type="button" class="button--secondary button--rect">
                  <i class="fa fa-pencil-square-o"></i>
                </button>
              </a>
						</td>
						<td>
							<button type="submit" class="button--delete button--rect" formaction="/admin/bezienswaardigheden/{{ $sight->id }}">
                <i class="fa fa-trash"></i>
              </button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

  </div>
@endsection