<footer>
  <div class="container footer-holder">
    <div class="row">
      <div class="col-3">
        <h4>Links</h4>
        <ul>
          @foreach(App\Link::all() as $link)
            <li>
              <a href="{{ $link->url }}">{{ $link->name }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <div class="col-3">
        <h4>Pagina's</h4>
        <ul>
          <li><a href="{{ url('/nieuws') }}">Nieuws</a></li>
          <li><a href="{{ url('/getuigenissen') }}">Antwerpen Studentenstad</a></li>
          <li><a href="{{ url('/') }}">Antwerpen Biedt aan</a></li>
          <li><a href="{{ url('/admin') }}">Admin</a></li>
        </ul>
      </div>
      <div class="col-3">
        <h4>Game</h4>
        <a href="{{ url('/game/promo') }}" class="button--ghost">Download de game</a>
      </div>
    </div>
  </div>
  <div class="footer-credits">
    <strong>Stan</strong>, in opdracht van Antwerpen, 2017
  </div>
</footer>
