@extends('layouts.app') @section('header') @include('partials.header-titled', array('title' => 'Scholen')) @endsection @section("content")
<div class="container">
	@foreach($scholen as $school)
	<div class="row">
		<div class="col-1-gt-2">
			
				<div class="school-item no-link">
					{{--@if(isset($school->media[0])) @if($school->media[0]->type == 'video')
					<img src="{{ str_replace([" //youtube ", "//www.youtube "], "//img.youtube ", str_replace("watch?v="," vi/
					    ", $school->media[0][0]->url . "/0.jpg ")) }}" class="news-image" alt="Hero image"> @else
					<img src="{{ $school->media[0]->url }}" class="news-image" alt="Hero image"> @endif @else
					<img src="none" class="news-image" alt="Hero image"> @endif--}}
					<div class="school-logo">
						<img src="{{ $school->logo_url }}" class="school-image" alt="Hero image">
					</div>
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
							<div class="col-2">
								<div class="school-opleidingen-item">
									{{ $field->name }}
								</div>
							</div>
							
							@endforeach
							</div>
						</div>
					</div>
				</div>
		
		</div>
	</div>
	@endforeach
</div>
@endsection