@extends('layouts.app')

@section("header")
  @include('partials.header')
@endsection

@section("content")
    <div class="container">
        <h1>{{ $sight->name }}</h1>
        @if(isset($sight->media[0]))
        <div class="slider" id="slider-sight">
            <div class="slider-previous" id="slide-previous">
                <i class="fa fa-chevron-left"></i>
            </div>
            <div class="slider-content">
                @foreach($sight->media as $media)
                    @if($media->type == 'video')
                        <div class="slider-item">
                            <iframe class="video" src="{{ str_replace("watch?v=","embed/", $media->url) }}" width="650" height="450"></iframe>
                        </div>
                    @else
                        <div class="slider-item"><img src="{{ $media->url }}" alt="Hero image"></div>
                    @endif
                    
                @endforeach
            </div>
            <div class="slider-next" id="slide-next">
                <i class="fa fa-chevron-right"></i>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-perc-60-gt-30">
                <div class="article-content">
                    <p>
                    {!! $sight->description !!}
                    {{--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam enim risus, venenatis sed risus a, rhoncus cursus justo. Morbi enim enim, pharetra id ultricies eu, porta sit amet libero. Sed hendrerit ornare nibh, bibendum hendrerit sem molestie sit amet. Integer sit amet vestibulum risus, non porta ex. Vivamus facilisis sapien vitae erat tincidunt, finibus lobortis libero elementum. Morbi ut elit et mauris tempor ultricies in sit amet tellus. Suspendisse potenti. Mauris eget ultricies nunc. Maecenas sit amet leo pulvinar, blandit est eget, dignissim erat. Nullam volutpat varius eros. Curabitur sit amet justo ligula. Morbi risus purus, congue ac nunc vitae, luctus feugiat nunc.--}}
                    </p>
                </div>
            </div>
            <div class="col-perc-40-gt-30">
                <h3>Contact</h3>
                <hr />
                <h2>{{ $sight->name }}</h2>
                <p>{{ $sight->address }}</p>
                <p><a href="tel:{{ $sight->tel }}">{{ $sight->tel }}</a></p>
            </div>
        </div>
    </div>
@endsection
