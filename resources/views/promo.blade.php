 @extends('layouts.empty') 
 
 @section('content')
 <div class="promo-close">
    <i class="fa fa-close" onclick="window.history.back();"></i>
 </div>
<div class="container promo-holder promo-holder-full">
    <div class="spacer-small"></div>

    <div class="row">
    <img src="{{ asset('images/angled_dag_promopage.png') }}" class="col-2 promo-image" width="450px" alt="App foto">

    <div class="col-2">
        <div class="spacer" id="promo-spacer"></div>

        <h2 class="promo-big-title">Get A life</h2>
        <h3 class="promo-title">Antwerpen Studentengame</h3>
        <hr />

        <ul>
            <li class="promo-list-item-small">Studeer als een beer</li>
            <li class="promo-list-item-small">Ontdek de stad als een ontdekkingsreiziger</li>
            <li class="promo-list-item-small">overleef het studentenleven</li>
            <li class="promo-list-item-small">Zuip tot je kruipt</li>
        </ul>

        <div class="row">
            <div class="col-2">
                <a href="">
                    <img src="{{ asset('images/google-play-badge.png') }}" class="promo-app-store-nopadding" alt="">
                </a>
            </div>
            <div class="col-2">
                <a href="">
                    <img src="{{ asset('images/appstore.svg') }}" class="promo-app-store-nopadding" alt="">
                </a>
            </div>
        </div>

    </div>
    </div>
    
</div>
</div>
@endsection