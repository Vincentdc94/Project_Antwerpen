<?php

namespace App\Http\Controllers;

use Laravel\Passport\HasApiTokens;

use Illuminate\Http\Request;
use Auth;
use App\GameInfo;

class ApiController extends Controller
{
    use HasApiTokens;

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

    public function getScore(Request $request, $id){
        $info = GameInfo::where('user_id', $id)->get();

        return response()->json($info->toJson());
    }

}
