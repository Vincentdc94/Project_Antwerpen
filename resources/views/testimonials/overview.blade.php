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
                @foreach($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->title }}</td>
                        <td>
                            @if ($testimonial->approved === 0)
                                Not Approved
                            @else
                                Approved
                            @endif
                        </td>
                        <td>
                            {{ $testimonial->author->firstName }} 
                            {{ $testimonial->author->lastName }} 
                        </td>
                        <td>
                          {{ $testimonial->category->name }}  
                        </td>
                        <td>
                            @if($testimonial->created_at === null)
                                Geen Datum
                            @else
                                {{ $testimonial->created_at }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  </div>
@endsection