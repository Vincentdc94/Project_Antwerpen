@extends('layouts.app') 

@section('header') 
    @include('partials.header-titled', array('title' => 'Nieuws')) 
@endsection 

@section("content")
<div class="container">
	@foreach($scholen as $school)
		<div class="row">
			<div class="col-2-gt-30">
				<a href="{{ url('/scholen/' . $school->id) }}" class="nodecoration">
					<div class="news-item box-medium">
						@if(isset($school->media))
							@if($school->media->type == 'video')
								<img src="{{ str_replace(["//youtube", "//www.youtube"], "//img.youtube", str_replace("watch?v=","vi/", $articles[0]->media[0]->url . "/0.jpg")) }}" class="news-image" alt="Hero image">
							@else
								<img src="{{ $school->media->url }}" class="news-image" alt="Hero image">
							@endif
						@else
							<img src="none" class="news-image" alt="Hero image">
						@endif
						<div class="news-overlay">
							<div class="news-title">
								<h3>{{ $school->name }}</h3>
							</div>
							<div class="news-button">Bekijk school</div>
							<div class="news-details">
								@foreach($school->fields as $field)
									{{ $field->name }}
								@endforeach
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	@endforeach
</div>
@endsection