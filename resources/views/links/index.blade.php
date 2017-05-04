<!DOCTYPE html>
<html>
<head>
	<title>links</title>
</head>
<body>

	<h1>Links index</h1>
	<ul>
	@foreach($links as $link)
		<li>
			<b>Naam:</b> {{ $link->name }}<br>
			<b>Url:</b> {{ $link->url }}
		</li>
	@endforeach
	</ul>

</body>
</html>