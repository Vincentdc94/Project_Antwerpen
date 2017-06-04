@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">

	<h2>Oei! Deze pagina kunnen we niet vinden!</h2>
	<p>
		Geen paniek, je kan teruggaan naar <a href="/">de homepagina</a> of een van deze andere interessante paginas bezoeken:
	</p>
	<ul>
		<li><a href="/getuigenissen">Getuigenissen</a></li>
		<li><a href="/nieuws">Nieuws</a></li>
		<li><a href="/bezienswaardigheden">Bezienswaardigheden</a></li>
		<li><a href="/scholen">Scholen</a></li>
		<li><a href="/profiel">Profiel</a></li>
	</ul>

</div>
@endsection
