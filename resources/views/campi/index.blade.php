@extends('layouts.basiclayout')

@section('content')
	<h1>Alle campussen</h1>
	<ul>
		@foreach ($campi as $campus)
			<li>{{ $campus->name }}: {{ $campus->description }}.</li>
		@endforeach
	</ul>
@stop