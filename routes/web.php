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

Route::get('tim', function() {
    return view('tim');
});

Route::get('/admin/artikel/maken', function(){
    return view('articles/new');
});

Route::get('/', 'PagesController@home');
Route::get('admin-dashboard', 'PagesController@adminDashboard');
Route::get('campussen', 'PagesController@campi');
Route::get('getuigenissen', 'PagesController@testimonials');
Route::get('bezienswaardigheden', 'PagesController@sights');
Route::get('nieuws', 'PagesController@news');
