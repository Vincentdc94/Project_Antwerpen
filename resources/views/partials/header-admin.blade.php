<div class="header-admin">
    <div class="container">
     <header class="header">
        <div class="float-left">
          <a href="{{ url('/') }}" class="logo" >
            <img src="{{ asset('images/logo.png') }}" alt="Stan Logo">
          </a>
        </div>
        <div class="float-left">
          <h2>
            {{ $title }}
          </h2>
        </div>
        <div class="float-right mobile-hidden relative">
            <a class="button--primary header-button" href="{{ $url_back }}">Terug</a>
        </div>
      </header>
    </div>
</div>
