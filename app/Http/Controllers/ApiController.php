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

    public function setScore(Request $request, $id){
        $params = $request->all();

        $info = GameInfo::where('user_id', $id);

        try{
            $info->update([
                'total_beers_drunk' => $params['totalBeersDrunk'],
                'total_hours_studied' => $params['totalHoursStudied'],
                'total_exams_failed' => $params['totalExamsFailed'],
                'total_exams_passed' => $params['totalExamsPassed'],
                'total_money_collected' => $params['totalMoneyCollected'],
                'total_money_spent' => $params['totalMoneySpent'],
                'total_time_sported' => $params['totalTimeSported'],
                'total_time_culture' => $params['totalTimeCulture'],
                'total_time_party' => $params['totalTimeParty'],
                'total_time_coma' => $params['totalTimeComa'],
                'total_time_blackout' => $params['totalTimeBlackout']
            ]);
            return response()->json(['success' => 'Scores zijn geupdate']);
        } catch(Exception $ex){
            return response()->json(['error' => 'Scores konden niet updaten', 'exception' => $ex->getMessage()]);
        }

    }

}
