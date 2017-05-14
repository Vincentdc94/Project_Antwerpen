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
		Contact:
			<ul>
				<li>Adres: {{ $sight->address }}</li>
				<li>E-mail: {{ $sight->email }}</li>
				<li>Telefoon: {{ $sight->tel }}</li>
			</ul>
		<hr>
	</li>
	@endforeach
	</ul>

</body>
</html>