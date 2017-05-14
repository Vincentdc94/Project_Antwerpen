@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Links", 'menu' => false))
@endsection

@section("content")
  <div class="container">
		<h4>Interessante links</h4>
		<div class="table-holder">
			<table>
			<thead>
				<tr>
					<th>Naam</th>
                    <th>Link</th>
                    <th>Beschrijving</th>
				</tr>
			</thead>  
			<tbody>
				@foreach($links as $link)
					<tr>
						<td>{{ $link->name }}</td>
                        <td><a href="{{ $link->url }}">{{ $link->url }}</a></td>
                        <td>{{ $link->description }}</td>
					</tr>
				@endforeach
			</form>
			</tbody>
		</table>
	</div>

  </div>
@endsection