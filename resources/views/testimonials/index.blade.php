	@extends('layouts.app')

@section("header")
  @include('partials.header-titled', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">
	
	<div class="article">
		@if(Auth::check())
			<div class="align-center">
				<a href="/getuigenissen/maken">
					<button class="button--primary">Maak je eigen getuigenis</button>
				</a>
			</div>
			<hr />
		@endif
		<div class="article-content">
			@foreach($testimonials as $testimonial)
				<a href="{{ url('/artikels/' . $testimonial->id) }}" class="nodecoration">
				<div class="box-testimonialmargin">
				
				@if(isset($testimonial->media[0]))
					@if($testimonial->media[0]->type == 'video')
					<div class="box">
						<div class="box-content">
							<div class="box-title">
								<h2>{{ $testimonial->title }}</h2>
							</div>
						</div>
						<iframe class="video" src="{{ str_replace("watch?v=","embed/", $testimonial->media[0]->url) }}" width="650" height="450"></iframe>
						<div class="box-details">
							<a href="mailto:{{ $testimonial->author->email }}" class="mail">
								<i class="fa fa-envelope"></i>
							</a>
							{{ $testimonial->author->firstName }} {{ $testimonial->author->lastName }}
						</div>
					
					</div>
					
					@elseif($testimonial->media[0]->type == 'link' || $testimonial->media[0]->type == 'image')
						<div class="box box-large" style="background-image: url({{ $testimonial->media[0]->url }}); background-size: cover">
							<div class="news-overlay">
								<div class="news-title">
									<h3>{{ $testimonial->title }}</h3>
								</div>
								<div class="news-details">
									<div class="news-author">
										<a href="mailto:{{ $testimonial->author->email }}" class="mail mail-white">
											<i class="fa fa-envelope"></i>
										</a>

											{{ $testimonial->author->firstName }} {{ $testimonial->author->lastName }}
									</div>
								</div>
							</div>
						</div>
					@endif
				@else
				<div class="box">
					<div class="box-content">
						<div class="box-title">
							<h2>{{ $testimonial->title }}</h2>
						</div>
					</div>
					<hr />
					<div class="box-content">
						{!! str_limit($testimonial->body, 100, '...') !!}
					</div>
					<div class="box-details">
						<a href="mailto:{{ $testimonial->author->email }}" class="mail">
							<i class="fa fa-envelope"></i>
						</a>
						
						{{ $testimonial->author->firstName }} {{ $testimonial->author->lastName }}
					</div>
				@endif
				</div>
				</a>
			@endforeach
		</div>
	</div>
</div>
@endsection
