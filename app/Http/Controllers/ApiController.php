<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getToken(){
        $query = http_build_query([
            'client_id' => auth()->id(),
            'redirect_uri' => url('callback'),
            'response_type' => 'code',
            'scope' => '',
        ]);

        return redirect(url('/oauth/authorize?').$query);
    }

    public function apiAdmin(){
        return view('sessions.api');
    }
}
