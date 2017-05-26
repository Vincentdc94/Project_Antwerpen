    @extends('layouts.app')

@section("header")
  @include('partials.header-admin', array('title' => "Artikels Overzicht", 'menu' => false, 'url_back'=>'/admin'))
@endsection

@section("content")
<form method="POST" action="/admin/artikels">
<input name="_method" type="hidden" value="DELETE">
{{ csrf_field() }}
  <div class="container">
        <a href="{{ url('admin/artikels/maken') }}" class="button--primary">Nieuw Artikel</a>
        @if($msg = session('message'))
        <div class="form-group">
            {{ $msg }}
        </div>
        @endif
        <h4>Artikel overzicht</h4>
        <div class="table-holder">
            <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Titel</th>
                    <th>Auteur</th>
                    <th>Categorie</th>
                    <th>Datum</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>  
            <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>
                            @if($article->deleted_at === null)
                                <i style="color:green" class="fa fa-check"></i>
                            @else
                                <a href="{{ url('admin/artikels/' . $article->id . '/beoordelen') }}">
                                    <i style="color:red" class="fa fa-times"></i>
                                </a>
                            @endif
                        </td>   
                        <td>{{ $article->title }}</td>
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
                        <td>
                            <a href="{{ url('admin/artikels/' . $article->id . '/bewerken') }}">
                                <button type="button" class="button--secondary button--rect">
                                    <i class="fa fa-pencil-square-o"></i>
                                </button>
                            </a>
                        </td>
                        <td>
                            <button type="submit" class="button--delete button--rect" formaction="/admin/artikels/{{ $article->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </div>
</form>
@endsection