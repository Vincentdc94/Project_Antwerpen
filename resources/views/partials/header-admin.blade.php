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
        <div class="float-right">
          @if($menu === true)
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
          @else
            <a class="button--primary" href="javascript:history.back()">Terug</a>
          @endif

        </div>
      </header>
    </div>
</div>
