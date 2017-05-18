<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function auth(Request $request){
        $params = $request->only('email', 'password');

        $username = $params['email'];
        $password = $params['password'];

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return Auth::user()->createToken('my_user', []);
        }

        return response()->json(['error' => 'Foute gebruikersnaam of wachtwoord']);
    }

    public function user(Request $request){
        return $request->user();
    }

}
