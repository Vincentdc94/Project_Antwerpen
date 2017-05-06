@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Scholen Overzicht", 'menu' => false))
@endsection

@section("content")
  <div class="container">
		<a href="{{ url('admin/scholen/maken') }}" class="button--primary">Nieuwe School</a>
		<h4>Scholen overzicht</h4>
		<div class="table-holder">
			<table>
			<thead>
				<tr>
					<th>School</th>
					{{--<th>Campussen</th>--}}
					<th>Opleidingen</th>
				</tr>
			</thead>  
			<tbody>
				@foreach($scholen as $school)
					<tr>
						<td>{{ $school->name }}
							<td>
								{{--@foreach($school->campi as $campus)
									<label class="label-campus">
										{{ $campus->name }}
									</label>
								@endforeach--}}
								@foreach($school->fields as $field)
									<label class="label-campus">
										{{ $field->name }}
									</label>
								@endforeach
							</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

  </div>
@endsection