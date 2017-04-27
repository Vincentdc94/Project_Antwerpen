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

/*
 * @index 	GET 	laat alle objecten zien
 * @create 	GET 	laat de form zien om een nieuw object te maken
 * @store 	POST 	stuurt een post request naar de database met het gemaakte artikel
 * @show 	GET 	laat een bepaald object zien
 * @edit 	GET 	laat de form zien om een object te bewerken
 * @update 	PATCH 	stuur patch request naar bestaand object om het aan te passen in de db
 * @destroy DELETE 	stuur delete request naar bepaald object om het te verwijderen
*/

Route::get('/', 'PagesController@home');
Route::get('home', 'HomeController@index');
Route::get('admin', 'PagesController@adminDashBoard');
Route::get('tim', 'PagesController@tim');

/* * SCHOOLS * */
Route::get('scholen', 'SchoolsController@index');
Route::get('admin/scholen/maken', 'SchoolsController@create');
Route::post('admin/scholen', 'SchoolsController@store');
Route::get('scholen/1', 'SchoolsController@show');
Route::get('admin/scholen/1/bewerken', 'SchoolsController@edit');
Route::patch('admin/scholen/1', 'SchoolsController@update');
Route::delete('admin/scholen/1', 'SchoolsController@destroy');

/* * CAMPI * */
Route::get('campussen', 'CampiController@index');
Route::get('admin/campussen/maken', 'CampiController@create');
Route::post('admin/campussen', 'CampiController@store');
Route::get('campussen/1', 'CampiController@show');
Route::get('admin/campussen/1/bewerken', 'CampiController@edit');
Route::patch('admin/campussen/1', 'CampiController@update');
Route::delete('admin/campussen/1', 'CampiController@destroy');

/* * TESTIMONIALS * */
Route::get('getuigenissen', 'TestimonialsController@index');
Route::get('admin/getuigenissen/maken', 'TestimonialsController@create');
Route::post('admin/getuigenissen', 'TestimonialsController@store');
Route::get('getuigenissen/1', 'TestimonialsController@show');
Route::get('admin/getuigenissen/1/bewerken', 'TestimonialsController@edit');
Route::patch('admin/getuigenissen/1', 'TestimonialsController@update');
Route::delete('admin/getuigenissen/1', 'TestimonialsController@destroy');

/* * NEWS * */
Route::get('nieuws', 'NewsController@index');
Route::get('admin/artikels/maken', 'NewsController@create');
Route::post('admin/artikels', 'NewsController@store');
Route::get('artikels/1', 'NewsController@show');
Route::get('admin/artikels/1/bewerken', 'NewsController@edit');
Route::patch('admin/artikels/1', 'NewsController@update');
Route::delete('admin/artikels/1', 'NewsController@destroy');

/* * SIGHTS * */
Route::get('bezienswaardigheden', 'SightsController@index');
Route::get('admin/bezienswaardigheden/maken', 'SightsController@create');
Route::post('admin/bezienswaardigheden', 'SightsController@store');
Route::get('bezienswaardigheden/1', 'SightsController@show');
Route::get('admin/bezienswaardigheden/1/bewerken', 'SightsController@edit');
Route::patch('admin/bezienswaardigheden/1', 'SightsController@update');
Route::delete('admin/bezienswaardigheden/1', 'SightsController@destroy');

Auth::routes();