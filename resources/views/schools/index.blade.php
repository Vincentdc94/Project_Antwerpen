<!DOCTYPE html>
<html>
<head>
	<title>scholen</title>
</head>
<body>

	<h1>Scholen index</h1>
	<ul>
	@foreach($scholen as $school)
		<li>
			<b>Naam: </b>{{ $school->name }} <br>
			<b>Beschrijving: </b>{{ $school->description }}<br>
			<b>Campussen: </b>
				@foreach($school->campi as $campus)
					{{ $campus->name }}, 
				@endforeach
		</li>
	@endforeach
	</ul>

</body>
</html>