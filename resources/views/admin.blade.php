@extends('layouts.app') 

@section("header") 
    @include('partials.header-admin', array('title' => "Admin dashboard", 'menu' => true)) 
@endsection 

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-perc-30">
                <button class="button--primary button--block">Nieuw</button>
                <br />
                <div class="admin-menu">
                    <ul>
                        <li><a href="{{ url('admin/artikel/overzicht') }}" class="button--menu">Artikels Overzicht</a></li>
                        <li><a href="{{ url('admin/artikel/overzicht') }}" class="button--menu">Bezienswaardigheden Overzicht</a></li>
                        <li><a href="{{ url('admin/artikel/overzicht') }}" class="button--menu">Scholen Overzicht</a></li>
                        <li><a href="{{ url('admin/artikel/overzicht') }}" class="button--menu">Link Overzicht</a></li>
                    </ul>
                </div>
                <br />
                <h2>Bezienswaardigheden</h2>
                 <div class="box">
                    <div class="box-content">
                        <h3>{{ 'Dit is een bezienswaardigheden' }}</h3>
                        <p>
                            {{ 'Dit is een tekstje van een bezienswaardigheid enzo maar ja het is maar een voorbeeld ...' }}
                        </p>
                    </div>
                    <a class="box-button" href="">Bekijk bezienswaardigheid</a>
                </div>
            </div>
            
            <div class="col-perc-40">
                <p></p>
                <h2>Artikels</h2>
                <div class="box">
                    <div class="box-content">
                        <h3>{{ 'Dit is een artikeltitel' }}</h3>
                        <p>
                            {{ 'Dit is een tekstje van een artikel enzo maar ja het is maar een voorbeeld ...' }}
                        </p>
                    </div>
                    <a class="box-button" href="">Bekijk Artikel</a>
                </div>
                <div class="box">
                    <div class="box-content">
                        <h3>{{ 'Dit is een artikeltitel' }}</h3>
                        <p>
                            {{ 'Dit is een tekstje van een artikel enzo maar ja het is maar een voorbeeld ...' }}
                        </p>
                    </div>
                    <a class="box-button" href="">Bekijk Artikel</a>
                </div>
            </div>
        
            <div class="col-perc-30">
                <h2>Scholen</h2>
                 <div class="box">
                    <div class="box-content">
                        <h3>{{ 'Dit is een school' }}</h3>
                        <p>
                            {{ 'Dit is een tekstje van een school enzo maar ja het is maar een voorbeeld ...' }}
                        </p>
                    </div>
                    <a class="box-button" href="">Bekijk School</a>
                </div>
            </div>
        </div>
    </div>
@endsection