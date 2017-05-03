@extends('layouts.app')

@section("header")
  @include('partials.header')
@endsection

@section("content")
  <div class="container">
    <div class="article">
      <h1 class="article-title">{{ 'Korting voor studenten van het mas' }}</h1 class="article-title">

        <div class="article-media">
          {{ 'media item' }}
        </div>

        <div class="article-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam enim risus, venenatis sed risus a, rhoncus cursus justo. Morbi enim enim, pharetra id ultricies eu, porta sit amet libero. Sed hendrerit ornare nibh, bibendum hendrerit sem molestie sit amet. Integer sit amet vestibulum risus, non porta ex. Vivamus facilisis sapien vitae erat tincidunt, finibus lobortis libero elementum. Morbi ut elit et mauris tempor ultricies in sit amet tellus. Suspendisse potenti. Mauris eget ultricies nunc. Maecenas sit amet leo pulvinar, blandit est eget, dignissim erat. Nullam volutpat varius eros. Curabitur sit amet justo ligula. Morbi risus purus, congue ac nunc vitae, luctus feugiat nunc.</p>

          <p>Praesent iaculis purus non consequat pretium. Phasellus eu nibh quis risus congue euismod. Morbi commodo sollicitudin tellus, non porta purus placerat ac. Aliquam vitae nisi sit amet lectus aliquam lacinia sed et orci. Vestibulum nec augue mollis, posuere sapien nec, consequat ligula. Etiam blandit imperdiet eros at dapibus. Sed consectetur et mauris ut volutpat. Etiam vel orci at dui interdum condimentum et consequat nisl. Etiam id iaculis neque. Integer dui tellus, posuere at leo a, lobortis mollis libero. Phasellus diam nulla, laoreet sit amet egestas id, vulputate ac sapien. Praesent lobortis diam dapibus, fringilla tortor id, bibendum ante. Vestibulum nisi arcu, varius a semper eu, lacinia placerat justo.</p>

          <p>Nam tristique lacus nibh, ut aliquam velit molestie sed. Ut suscipit elit massa, venenatis eleifend libero scelerisque sed. Donec consequat, risus at ultricies commodo, metus quam interdum lacus, nec congue odio elit nec orci. Sed et hendrerit elit, sed elementum odio. Curabitur non eros sem. Maecenas et erat enim. Aliquam sed nunc suscipit, rutrum orci ut, lobortis mi.</p>

          <p>Nam odio erat, vehicula a velit ut, porta euismod est. Donec dapibus odio sit amet mi ultricies cursus. Praesent ut orci erat. Donec vel pharetra nisl. Sed a libero id urna laoreet aliquam. Praesent ornare augue mauris, a euismod metus facilisis interdum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam sollicitudin vestibulum turpis, eget euismod sem laoreet id. Proin quis nisi quis massa lobortis euismod. Phasellus scelerisque vitae lorem nec ornare. Phasellus rhoncus convallis erat mollis posuere.. </p>
        </div>
      </div>
    </div>
    <br />
    <div class="well well-nopadding">
      <div class="container container-nopadding">
        <div class="row article-paginator">
          <a class="col-2 article-item" href="{{ url('artikel/1') }}">
            <div class="row">
              <div class="col-perc-25 article-paginator-arrow article-left">
                <i class="fa fa-angle-left"></i>
              </div>
              <div class="col-perc-75 article-paginator-text-left">
                De titel van het vorige artikel
              </div>
            </div>
          </a>
          <a class="col-2 article-item" href="{{ url('artikel/1') }}">
            <div class="row">
              <div class="col-perc-75 article-paginator-text-right">
                De titel van het volgende artikel
              </div>
              <div class="col-perc-25 article-paginator-arrow article-right">
                <i class="fa fa-angle-right"></i>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="article">
        <h4>Comments</h4>

        <div class="comment">
          <div class="comment-content">
            <h5 class="comment-title">{{ 'Jesse Op De Beeck' }}</h5>
            <p>{{ 'Dit is een zeer inspirerend artikel. Bedankt voor deze uitstekende leeservaring.' }}</p>
          </div>
          <div class="row">
            <div class="col-perc-75">
              <div class="comment-details">
                {{ '20 April 2017, 14:20u' }}
              </div>
            </div>
            <div class="col-perc-25">
              <div class="comment-button">
                Antwoorden
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  @endsection
