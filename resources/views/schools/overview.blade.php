@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Scholen Overzicht", 'menu' => false, 'url_back' => '/admin'))
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
					<th></th>
					<th></th>
				</tr>
			</thead>  
			<tbody>
			<form method="POST" action="admin/scholen">
            <input name="_method" type="hidden" value="DELETE">
            {{ csrf_field() }}
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
							<td>
                            <a href="{{ url('admin/scholen/' . $school->id . '/bewerken') }}">
                                <button type="button">
                                    <i class="fa fa-pencil-square-o"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <button type="submit" formaction="/admin/scholen/{{ $school->id }}">
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