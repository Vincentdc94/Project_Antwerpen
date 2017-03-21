<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// redirect /campi naar lijst van campi
Route::get('campi', function() {
	return view('campi');
});

// redirect /dashboard naar admin dashboard
Route::get('dashboard', function() {
	return view('admin-dashboard');
});

// redirect /bezienswaardigheden naar overzicht bezienswaardigheden
Route::get('bezienswaardigheden', function() {
	return view('views');
});

// redirect /statistieken naar statistieken pagina
Route::get('statistieken', function() {
	return view('gamestats');
});

// redirect /links naar pagina met interessante links
Route::get('links', function() {
	return view('links');
});

// redirect /nieuws naar nieuwspagina
Route::get('nieuws', function() {
	return view('news');
});

// redirect /getuigenissen naar testimonials pagina
Route::get('getuigenissen', function() {
	return view('testimonials');
});

// redirect /profiel naar userprofile
Route::get('profiel', function() {
	return view('userprofile');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
