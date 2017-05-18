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

        $mostBeers;
        $mostStudied;
        $mostExamsFailed;
        $mostExamsPassed;
        $mostMoneyCollected;
        $mostMoneySpent;
        $mostSported;
        $mostCulture;
        $mostParty;
        $mostComa;
        $mostBlackout;

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
            ->with(compact('mostBlackout'));
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

        return redirect()->home();
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
