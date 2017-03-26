<!DOCTYPE html>
<html lang='nl'>
<head>
    <meta charset='UTF-8'>
    <title>stAn - Home</title>
</head>
<body>

    <div class='content'>
        <h1>Home</h1>
        <p>Woela dikke homepage jonge</p>
        <hr>
    </div>

    <h3>Table of Contents</h3>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/admin-dashboard') }}">Admin Dashboard</a></li>
        <li><a href="{{ url('/admin-bezienswaardigheden') }}">Admin bezienswaardigheden lijst</a></li>
        <li><a href="{{ url('/admin-bezienswaardigheid') }}">Admin bezienswaardigheid aanmaken/bewerken</a></li>
        <li><a href="{{ url('/admin-artikels') }}">Admin lijst artikels</a></li>
        <li><a href="{{ url('/admin-artikel') }}">Admin artikel aanmaken/bewerken</a></li>
        <li><a href="{{ url('/admin-campi') }}">Admin campi lijst</a></li>
        <li><a href="{{ url('/admin-campus') }}">Admin campus aanmaken/bewerken</a></li>
        <li><a href="{{ url('/nieuws') }}">Nieuws</a></li>
        <li><a href="{{ url('/artikel') }}">Nieuwsartikel details</a></li>
        <li><a href="{{ url('/campussen') }}">Lijst campi</a></li>
        <li><a href="{{ url('/campus') }}">Campus details</a></li>
        <li><a href="{{ url('/getuigenissen') }}">Getuigenissen</a></li>
        <li><a href="{{ url('/getuigenis') }}">Getuigenis details</a></li>
        <li><a href="{{ url('/bezienswaardigheden') }}">Bezienswaardigheden</a></li>
        <li><a href="{{ url('/bezienswaardigheid') }}">Bezienswaardigheid details</a></li>
        <li><a href="{{ url('/profiel') }}">Profiel</a></li>
        <li><a href="{{ url('/statistieken') }}">Game statistieken</a></li>
        <li><a href="{{ url('/links') }}">Links</a></li>
    </ul>

<footer>
    <h2>How jos da is ier gewoon ne footer</h2>
</footer>

</body>
</html>