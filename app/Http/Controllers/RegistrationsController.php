<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\GameInfo;
use DB;
use App\Mail\Welcome;

class RegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $gameInfo = GameInfo::all();

        $mostBeers = DB::table('game_info')
            ->select('total_beers_drunk', 'user_id')
            ->orderBy('total_beers_drunk', 'desc')
            ->take(5)
            ->get();
        $mostStudied = DB::table('game_info')
            ->select('total_hours_studied', 'user_id')
            ->orderBy('total_hours_studied', 'desc')
            ->take(5)
            ->get();
        $mostExamsFailed = DB::table('game_info')
            ->select('total_exams_failed', 'user_id')
            ->orderBy('total_exams_failed', 'desc')
            ->take(5)
            ->get();
        $mostExamsPassed = DB::table('game_info')
            ->select('total_exams_passed', 'user_id')
            ->orderBy('total_exams_passed', 'desc')
            ->take(5)
            ->get();
        $mostMoneyCollected = DB::table('game_info')
            ->select('total_money_collected', 'user_id')
            ->orderBy('total_money_collected', 'desc')
            ->take(5)
            ->get();;
        $mostMoneySpent = DB::table('game_info')
            ->select('total_money_spent', 'user_id')
            ->orderBy('total_money_spent', 'desc')
            ->take(5)
            ->get();;
        $mostSported = DB::table('game_info')
            ->select('total_time_sported', 'user_id')
            ->orderBy('total_time_sported', 'desc')
            ->take(5)
            ->get();;
        $mostCulture = DB::table('game_info')
            ->select('total_time_culture', 'user_id')
            ->orderBy('total_time_culture', 'desc')
            ->take(5)
            ->get();;
        $mostParty = DB::table('game_info')
            ->select('total_time_party', 'user_id')
            ->orderBy('total_time_party', 'desc')
            ->take(5)
            ->get();;
        $mostComa = DB::table('game_info')
            ->select('total_time_coma', 'user_id')
            ->orderBy('total_time_coma', 'desc')
            ->take(5)
            ->get();;
        $mostBlackout = DB::table('game_info')
            ->select('total_time_blackout', 'user_id')
            ->orderBy('total_time_blackout', 'desc')
            ->take(5)
            ->get();;

        return view('registrations.index')
            ->with(compact('mostBeers'))
            ->with(compact('mostStudied'))
            ->with(compact('mostExamsFailed'))
            ->with(compact('mostExamsPassed'))
            ->with(compact('mostMoneyCollected'))
            ->with(compact('mostMoneySpent'))
            ->with(compact('mostSported'))
            ->with(compact('mostCulture'))
            ->with(compact('mostParty'))
            ->with(compact('mostComa'))
            ->with(compact('mostBlackout'))
            ->with(compact('users'))
            ->with(compact('gameInfo'));
    }

    public function overview()
    {
        $users = User::all();
        $roles = Role::all();
        
        return view('registrations.overview')->with(compact('users'))->with(compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:50',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        $user->save();

        auth()->login($user);

        GameInfo::create([
            'user_id' => $user->id
        ]);

        \Mail::to($user)->send(new Welcome);

        session()->flash('message', "Je account is geregistreerd! Welkom bij St'an, " . $user->firstName . "!");

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->role_id = $request->role;
        $user->save();

        return redirect('admin/gebruikers/overzicht');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
