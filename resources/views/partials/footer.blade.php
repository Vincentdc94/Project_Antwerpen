<footer>
  <div class="container footer-holder">
    <div class="row">
      <div class="col-3">
        <h4>Links</h4>
        <ul>
          <li><a href="http://www.antwerpen.be/">Antwerpen</a></li>
          <li><a href="http://www.gate15.be/">GATE 15</a></li>
          @if(Auth::user() != null)
            <li>Ingelogd als {{ Auth::user()->firstName }}</li>
          @else
            <li>Niet ingelogd</li>
          @endif
        </ul>
      </div>
      <div class="col-3">
        <h4>Pagina's</h4>
      </div>
      <div class="col-3">
        <h4>Zoeken</h4>
      </div>
    </div>
  </div>
  <div class="footer-credits">
    <strong>Stan</strong>, in opdracht van Antwerpen, 2017
  </div>
</footer>
