<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
    	return view('home');
    }

    public function adminDashboard()
    {
    	return view('dashboard');
    }

    public function campi()
    {
    	return view('campi');
    }

    public function testimonials()
    {
    	return view('testimonials');
    }

    public function sights()
    {
    	return view('sights');
    }

    public function news()
    {
    	return view('news');
    }
}
