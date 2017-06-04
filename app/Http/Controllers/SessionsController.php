<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\GameInfo;

class SessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if (! auth()->attempt(request(['email', 'password'])) )
        {
            return back()->withErrors([
                'message' => 'Oeps, verkeerde gegevens! Inloggen mislukt.'
            ]);
        }

        session()->flash('message', 'Succesvol ingelogd. Welkom terug, ' . Auth()->user()->firstName . '!');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        $user = User::find(Auth::user()->id);

        return view('profile', compact('user'));
    }

    public function pikUpload(Request $request, $id){
                   /* ^ typfout niet gesponsord door Jesse */

        $user = User::find(Auth::user()->id);

        $profilePath = $request->image->store('public/profile');

        $avatarPath = str_replace("public/","storage/", $profilePath);

        $user->avatar = $avatarPath;

        $user->save();

        return response()->json(['image' => $user->avatar], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);

        if(request('email') == $user->email)
        {
            $user->email = null;
            $user->save();
        }

        $this->validate(request(), [
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:50',
            'email' => 'required|unique:users|email'
        ]);

        $user->firstName    = request('firstName');
        $user->lastName     = request('lastName');
        $user->email        = request('email');
        $user->save();

        return redirect('profiel');
    }

    public function createAppToken($id){
        $user = User::find($id);

        return $user->createToken('App')->accessToken();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        auth()->logout();

        session()->flash('message', 'Succesvol uitgelogd. Tot ziens!');

        return redirect('/');
    }
}
