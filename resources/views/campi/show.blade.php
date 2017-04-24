<!DOCTYPE html>
<html>
<head>
	<title>campussen show</title>
</head>
<body>
<ul>
	@foreach($campi as $campus)
		<li>{{ $campus->name }}</li>
	@endforeach
</ul>
</body>
</html>