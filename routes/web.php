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

Route::get('admin/school/maken', function(){
    return view('schools/new');
});

Route::get('artikel/1', function(){
    return view('articles/article');
});

Route::get('admin/artikel/maken', function(){
    return view('articles/new');
});

// /nieuws om alle artikels te zien
Route::get('nieuws', 'NewsController@index');
// /admin/artikels/maken om een post te maken, laat de form pagina zien
Route::get('admin/artikels/maken', 'NewsController@create');
// POST request naar /posts om gemaakt artikel te submitten naar database
Route::post('admin/artikels', 'NewsController@store');
// /artikels/ bepaald artikel te laten zien
Route::get('artikels/{article}', 'NewsController@show');
// /admin/artikels/bepaaldartikel/bewerk om te kunnen bewerken
Route::get('admin/artikels/{article}/bewerk', 'NewsController@edit');
// patch request sturen naar admin pagina van bepaald artikel
Route::patch('admin/artikels/{article}', 'NewsController@update');
// delete request naar bepaald artikel
Route::delete('admin/artikels/{article}', 'NewsController@destroy');

Route::get('/', 'PagesController@home');
Route::get('admin', 'PagesController@adminDashboard');
Route::get('campussen', 'PagesController@campi');
Route::get('getuigenissen', 'PagesController@testimonials');
Route::get('bezienswaardigheden', 'PagesController@sights');

Auth::routes();

Route::get('home', 'HomeController@index');