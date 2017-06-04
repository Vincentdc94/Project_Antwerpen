@extends('layouts.app')

@section("header")
  @include('partials.header', array('title' => "Antwerpen De Beste Studentenstad"))
@endsection

@section("content")
<div class="container">

	<h1>Oei! Die actie kon niet uitgevoerd worden!</h1>
	<p>Probeer terug te keren naar de vorige pagina en refresh hem met Ctrl+Shift+R of Ctrl+F5. Als het probleem blijft opkomen, contacteer een admin.</p>

</div>
@endsection