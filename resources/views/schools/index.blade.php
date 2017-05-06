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
			<b>Opleidingen: </b>
				<ul>
					@foreach($school->fields as $field)
						<li>{{ $field->name }}</li>
					@endforeach
				</ul>
				<br>
		</li>
	@endforeach
	</ul>

</body>
</html>