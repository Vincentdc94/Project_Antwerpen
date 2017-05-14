@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Links Overzicht", 'menu' => false, 'url_back' => '/admin'))
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
                    <th></th>
                    <th></th>
				</tr>
			</thead>  
			<tbody>
			<form method="POST" action="admin/links">
			<input name="_method" type="hidden" value="DELETE">
			{{ csrf_field() }}
				@foreach($links as $link)
					<tr>
						<td>{{ $link->name }}</td>
                        <td><a href="{{ $link->url }}">{{ $link->url }}</a></td>
                        <td>
	                        <a href="{{ url('admin/links/' . $link->id . '/bewerken') }}">
	                        	<button type="button" class="button--secondary button--rect">
	                        		<i class="fa fa-pencil-square-o"></i>
	                        	</button>
	                        </a>
                        </td>
                        <td>
	                        <button type="submit" class="button--delete button--rect" formaction="/admin/links/{{ $link->id }}">
	                        	<i class="fa fa-trash" style="color:red"></i>
	                        </button>
                        </td>
					</tr>
				@endforeach
			</form>
			</tbody>
		</table>
	</div>

  </div>
@endsection