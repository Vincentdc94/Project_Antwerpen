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
            Artikel Aanmaken
          </h2>
        </div>
        <div class="float-right">
          @if($menu === true)
            <div class="menu-holder">
              <div class="menu-search" id="menu-search-button">
                <i class="fa fa-search"></i> 
              </div>
              <div class="menu" id="menu-button">
                <i class="fa fa-navicon"></i> <div class="menu-text">Menu</div>
              </div>
            </div>
          @else
            <button class="button--primary">Terug</button>
          @endif
          
        </div>
      </header>
    </div>
</div>