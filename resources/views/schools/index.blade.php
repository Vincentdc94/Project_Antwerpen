@extends('layouts.app') @section('header') @include('partials.header-titled', array('title' => 'Scholen')) @endsection @section("content")
<div class="container">
	<div class="row">
		@foreach($scholen as $school)
		<div class="col-1-gt-2"> <!-- col-2-gt-2 -->
			<div class="school-item no-link">
				<div class="school-info">
					<div class="school-content">
						<h2 class="school-title">{{ $school->name }}</h2>
						<p>
							{{ str_limit(strip_tags($school->description), 100, '...') }}
						</p>
						<a href="{{ url('/scholen/' . $school->id) }}" class="school-button">Bekijk school</a>
					</div>
					<div class="school-opleidingen">
						<h4 class="school-opleidingen-title">Opleidingen</h4>
						<div class="row">
							@foreach($school->fields as $field)
							<div class="col-perc-33">
								<div class="school-opleidingen-item">
									<a href="{{ url('/scholen/' . $school->id . '#opleidingen-' . $field->name) }}">
										{{ str_limit($field->name, 35, '...') }}
									</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="spacer-small"></div>
		@endforeach
	</div>
</div>
@endsection