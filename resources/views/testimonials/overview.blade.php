@extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Getuigenissen Overzicht", 'menu' => false))
@endsection

@section("content")
  <div class="container">
        <h4>Getuigenissen overzicht</h4>
        <div class="table-holder">
            <table>
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Status</th>
                    <th>Auteur</th>
                    <th>Categorie</th>
                    <th>Datum</th>
                </tr>
            </thead>  
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>{{ $article->title }}</td>
                        <td>
                            @if ($article->approved === 0)
                                Not Approved
                            @else
                                Approved
                            @endif
                        </td>
                        <td>
                            {{ $article->author->firstName }} 
                            {{ $article->author->lastName }} 
                        </td>
                        <td>
                          {{ $article->category->name }}  
                        </td>
                        <td>
                            @if($article->created_at === null)
                                Geen Datum
                            @else
                                {{ $article->created_at }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  </div>
@endsection