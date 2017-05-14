<div class="hero">
  <div class="hero-overlay">
    <div class="container row">
      <header class="header">
        <div class="float-left">
          <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" class="logo" alt="Stan Logo">
          </a>
        </div>
        <div class="float-right">
          <div class="menu-holder">
            <div class="menu-search" id="menu-search-button">
              <i class="fa fa-search"></i>
            </div>
            <div class="menu-account" id="menu-account-button">
              <i class="fa fa-user"></i>
            </div>
            <div class="menu" id="menu-button">
              <i class="fa fa-navicon"></i> <div class="menu-text">Menu</div>
            </div>
          </div>
          <div class="select-options-holder select-account">
              @if(Auth::check())
                <div class="select-option"><a href='{{ url('/profiel') }}'>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a></div>
                <div class="select-option"><a href="{{ url('/logout') }}">Uitloggen</a></div>
              @else
                <div class="select-option"><a href="{{ url('/registreer') }}">Registreer</a></div>
                <div class="select-option"><a href="{{ url('/login') }}">Inloggen</a></div>
              @endif
          </div>
        </div>
      </header>
    </div>
    <div class="header-underlined"></div>
    <div class="container">
      <div class="title">
        <h1>{{ $title }}</h1>
      </div>
    </div>
  </div>
</div>
