<div class="navigation" id="navigation">
    <div class="container">
        <div class="row">
            <div class="navigation-title float-left">
                Menu
            </div>

            <div class="navigation-close float-right">
                <i class="fa fa-close" id="navigation-close"></i>
            </div>
        </div>
        
        <div class="row">
            <div class="col-perc-60-gt-30">
                <ul class="navigation-items">
                    <li><a href="{{ url('/nieuws') }}" class="navigation-item">Nieuws</a></li>
                    <li><a href="{{ url('/getuigenissen') }}" class="navigation-item">Antwerpen Studentenstad</a></li>
                    <li><a href="{{ url('/') }}" class="navigation-item">Antwerpen Biedt aan</a></li>
                    <li><a href="{{ url('/admin') }}" class="navigation-item">Admin</a></li>
                </ul>
            </div>
            <div class="col-perc-40-gt-30">
                <h2 class="link-title">Links</h2>
                <ul class="link-holder">
                @foreach(App\Link::all() as $link)
                    <li>
                        <a href="{{ $link->url }}">{{ $link->name }}</a>
                    </li>
                @endforeach
                </ul>
                <a href="{{ url('/game') }}" class="button--ghost">Bekijk Game</a>
            </div>
        </div>
    </div>
</div>