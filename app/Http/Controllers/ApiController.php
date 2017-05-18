<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ApiController extends Controller
{
    public function auth(Request $request){
        $params = $request->only('email', 'password');

        $email = $params['email'];
        $password = $params['password'];

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return Auth::user()->createToken($email, []);
        }

        return response()->json(['error' => 'Foute gebruikersnaam of wachtwoord']);
    }

    public function user(Request $request){
        return $request->user();
    }

}
