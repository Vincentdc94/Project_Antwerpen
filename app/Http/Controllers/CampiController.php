<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampiController extends Controller
{
    public function index()
    {
        /*$campi = array('Campus Zuid', 'Campus Hoboken', 'Campus Groenplaats', 'Campus Groenenborger', 'Campus Middelheim', 'Campus Meistraat');*/

        $campi = DB::table('campi')->get();

    	return view('campi.index', compact('campi'));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show()
    {
        $campi = DB::table('campi')->find()
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
