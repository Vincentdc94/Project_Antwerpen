<div class="header-admin">
    <div class="container">
     <header class="header">
        <div class="float-left">
          <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="Stan Logo">
          </a>
        </div>
        <div class="float-left">
          <h2>
            {{ $title }}
          </h2>
        </div>
        <div class="float-right relative">
            <a class="button--primary header-button" href="{{ $url_back }}">Terug</a>
        </div>
      </header>
    </div>
</div>
