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
Route::get('admin/scholen/overzicht', 'SchoolsController@index');
Route::get('admin/scholen/maken', 'SchoolsController@create');
Route::post('admin/scholen', 'SchoolsController@store');
Route::get('scholen/{id}', 'SchoolsController@show');
Route::get('admin/scholen/{id}/bewerken', 'SchoolsController@edit');
Route::patch('admin/scholen/{id}', 'SchoolsController@update');
Route::delete('admin/scholen/{id}', 'SchoolsController@destroy');

/* * CAMPI * */
Route::get('admin/campussen/maken', 'CampiController@create');
Route::post('admin/campussen', 'CampiController@store');
Route::get('campussen/{id}', 'CampiController@show');
Route::get('admin/campussen/{id}/bewerken', 'CampiController@edit');
Route::patch('admin/campussen/{id}', 'CampiController@update');
Route::delete('admin/campussen/{id}', 'CampiController@destroy');

/* * TESTIMONIALS * */
Route::get('admin/getuigenissen/overzicht', 'TestimonialsController@index');
Route::get('admin/getuigenissen/maken', 'TestimonialsController@create');
Route::post('admin/getuigenissen', 'TestimonialsController@store');
Route::get('getuigenissen/{id}', 'TestimonialsController@show');
Route::get('admin/getuigenissen/{id}/bewerken', 'TestimonialsController@edit');
Route::patch('admin/getuigenissen/{id}', 'TestimonialsController@update');
Route::delete('admin/getuigenissen/{id}', 'TestimonialsController@destroy');

// /nieuws om alle artikels te zien
/* * NEWS * */

Route::get('admin/artikels/overzicht', 'NewsController@index');
Route::get('nieuws', 'NewsController@nieuws');
Route::get('admin/artikels/maken', 'NewsController@create');
Route::post('admin/artikels', 'NewsController@store');
Route::get('artikels/{id}', 'NewsController@show');
Route::get('admin/artikels/{id}/bewerken', 'NewsController@edit');
Route::patch('admin/artikels/{id}', 'NewsController@update');
Route::delete('admin/artikels/{id}', 'NewsController@destroy');

/* * SIGHTS * */
Route::get('admin/bezienswaardigheden/overzicht', 'SightsController@index');
Route::get('admin/bezienswaardigheden/maken', 'SightsController@create');
Route::post('admin/bezienswaardigheden', 'SightsController@store');
Route::get('bezienswaardigheden/{id}', 'SightsController@show');
Route::get('admin/bezienswaardigheden/{id}/bewerken', 'SightsController@edit');
Route::patch('admin/bezienswaardigheden/{id}', 'SightsController@update');
Route::delete('admin/bezienswaardigheden/{id}', 'SightsController@destroy');

/* * LINK * */
Route::get('admin/links/overzicht', 'LinkController@index');
Route::get('admin/link/maken', 'LinkController@create');
Route::post('admin/links', 'LinkController@store');
Route::get('links/{id}', 'LinkController@show');
Route::get('admin/links/{id}/bewerken', 'LinkController@edit');
Route::patch('admin/links/{id}', 'LinkController@update');
Route::delete('admin/links/{id}', 'LinkController@destroy');

Auth::routes();