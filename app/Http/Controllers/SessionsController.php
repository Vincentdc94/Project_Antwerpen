<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\gameInfo;

class SessionsController extends Controller
{
    public function __construct()
    {   
        // Jesse ik heb dit gecomment want fuck gij kunt echt ni programmeren en permissions fixen, jk ily xxx
        // $this->middleware('guest', ['except' => 'destroy']);
    }

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

        return redirect()->home();
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
        /*$gameInfo = gameInfo::where('user_id', Auth::user()->id);

        dd($gameInfo);*/

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

        $this->validate(request(), [
            'new_password' => 'confirmed'
        ]);

        $user->firstName    = request('new_firstName');
        $user->lastName     = request('new_lastName');
        $user->email        = request('new_email');
        $user->password     = request(bcrypt('new_password'));
        $user->save();

        return redirect('profiel');
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

        return redirect()->home();
    }
}
