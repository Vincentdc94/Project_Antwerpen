<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CampiController extends Controller
{
    public function index()
    {
        $campi = array('Campus Zuid', 'Campus Hoboken', 'Campus Groenplaats', 'Campus Groenenborger', 'Campus Middelheim', 'Campus Meistraat');

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
