@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Links Overzicht", 'menu' => false))
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
				@foreach($links as $link)
					<tr>
						<td>{{ $link->name }}</td>
                        <td><a href="{{ $link->url }}">{{ $link->url }}</a></td>
                        <td>
	                        <a href="{{ url('admin/links/maken') }}">
	                        	<button><i class="fa fa-pencil-square-o"></i></button>
	                        </a>
                        </td>
                        <td>
                        	<button>
                        		<i class="fa fa-trash" style="color:red"></i>
                        	</button>
                        </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

  </div>
@endsection