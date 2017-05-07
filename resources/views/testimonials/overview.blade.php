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
                    <th>Auteur</th>
                    <th>Datum</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>  
            <tbody>
            <form method="POST" action="admin/getuigenissen">
            <input name="_method" type="hidden" value="DELETE">
            {{ csrf_field() }}
                @foreach($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->title }}</td>
                        <td>
                            {{ $testimonial->author->firstName . ' ' . $testimonial->author->lastName }} 
                        </td>
                        <td>
                            @if($testimonial->created_at === null)
                                Geen Datum
                            @else
                                {{ $testimonial->created_at }}
                            @endif
                        </td>
                        <td>
                            <button type="button">
                                <i class="fa fa-pencil-square-o"></i>
                            </button>
                        </td>
                        <td>
                            <button type="submit" formaction="/admin/getuigenissen/{{ $testimonial->id }}">
                                <i class="fa fa-trash" style="color:red"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

  </div>
@endsection