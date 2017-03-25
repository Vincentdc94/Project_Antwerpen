@extends('layouts.basiclayout')

@section('content')
	<h1>Alle campi</h1>
	<ul>
		@foreach ($campi as $campus)
			<li>{{ $campus }}</li>
		@endforeach
	</ul>
@stop