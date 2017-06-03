<div class="navigation navigation-mobile" id="navigation">
    <div class="container">
        <div class="navigation-close" id="navigation-close">
            <i class="fa fa-close"></i>
        </div> 
    
        <div class="navigation-title">
            Menu
        </div>

        <ul class="navigation-items">
             <li><a href="{{ url('/nieuws') }}" class="navigation-item">Nieuws</a></li>
            <li><a href="{{ url('/getuigenissen') }}" class="navigation-item">Getuigenissen</a></li>
            <li><a href="{{ url('/scholen') }}" class="navigation-item">Scholen</a></li>
            <li><a href="{{ url('/bezienswaardigheden') }}" class="navigation-item">Bezienswaardigheden</a></li>
            @if(Auth::check())
              <li><a href="{{ url('/admin') }}" class="navigation-item">Admin</a></li>
            @endif
        </ul>

    </div>
</div>