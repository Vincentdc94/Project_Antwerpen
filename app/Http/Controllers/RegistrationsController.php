<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\gameInfo;
use DB;

class RegistrationsController extends Controller
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

        DB::table('gameInfo')->insert([
            'user_id' => $user->id
        ]);

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

        $user->role_id = request('user-new-role');
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
