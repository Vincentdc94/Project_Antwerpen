@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Scholen Overzicht", 'menu' => false))
@endsection

@section("content")
  <div class="container">
		<a href="{{ url('admin/link/maken') }}" class="button--primary">Nieuwe Link</a>
		<h4>Link overzicht</h4>
		<div class="table-holder">
			<table>
			<thead>
				<tr>
					<th>Naam</th>
                    <th>Link</th>
				</tr>
			</thead>  
			<tbody>
				@foreach($links as $link)
					<tr>
						<td>{{ $link->name }}</td>
                        <td>{{ $link->url }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

  </div>
@endsection