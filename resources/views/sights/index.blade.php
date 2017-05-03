<!DOCTYPE html>
<html>
<head>
	<title>bezienswaardigheden</title>
</head>
<body>

	<h1>Bezienswaardigheden</h1>
	<ul>
	@foreach($sights as $sight)
	<li>
		Naam: {{ $sight->name }}<br>
		Beschrijving: {{ $sight->description }}<br>
		Contact: {{ $sight->contact_id }}	
		<hr>
	</li>
	@endforeach
	</ul>

</body>
</html>