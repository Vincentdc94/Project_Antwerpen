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

Route::get('/', 'PagesController@home')->name('home');
Route::get('home', 'HomeController@index');
Route::get('admin', 'PagesController@adminDashBoard');
Route::get('tim', 'PagesController@tim');

/* * SESSIONS * */
Route::get('profiel', 'SessionsController@show');
Route::post('profiel/{id}/foto/maken', 'SessionsController@pikUpload');
Route::patch('profiel', 'SessionsController@update');
Route::get('login', 'SessionsController@create');
Route::post('login', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');

/* * REGISTRATION * */
Route::get('admin/gebruikers/overzicht', 'RegistrationsController@overview');
Route::get('registreer', 'RegistrationsController@create');
Route::post('registreer', 'RegistrationsController@store');

/* * MEDIA* */
Route::post('media/upload', 'MediaController@upload');

/* * SCHOOLS * */
Route::get('scholen', 'SchoolsController@index');
Route::get('admin/scholen/overzicht', 'SchoolsController@overview')->name('schools');
Route::get('admin/scholen/maken', 'SchoolsController@create');
Route::post('scholen', 'SchoolsController@store');
Route::get('scholen/{id}', 'SchoolsController@show');
Route::get('admin/scholen/{id}/bewerken', 'SchoolsController@edit');
Route::patch('admin/scholen/{id}', 'SchoolsController@update');
Route::delete('admin/scholen/{id}', 'SchoolsController@destroy');

/* * CAMPI * */
Route::get('campussen', 'CampiController@index');
Route::get('admin/campussen/overzicht', 'CampiController@overview')->name('campi');
Route::get('admin/campussen/maken', 'CampiController@create');
Route::post('admin/campussen', 'CampiController@store');
Route::get('campussen/{id}', 'CampiController@show');
Route::get('admin/campussen/{id}/bewerken', 'CampiController@edit');
Route::patch('campussen/{id}', 'CampiController@update');
Route::delete('admin/campussen/{id}', 'CampiController@destroy');

/* * TESTIMONIALS * */
Route::get('getuigenissen', 'TestimonialsController@index');
Route::get('admin/getuigenissen/overzicht', 'TestimonialsController@overview')->name('testimonials');
Route::get('getuigenissen/maken', 'TestimonialsController@create');
Route::post('getuigenissen', 'TestimonialsController@store');
Route::get('getuigenissen/{id}', 'TestimonialsController@show');
Route::get('getuigenissen/{id}/bewerken', 'TestimonialsController@edit');
Route::patch('getuigenissen/{id}', 'TestimonialsController@update');
Route::delete('getuigenissen/{id}', 'TestimonialsController@destroy');

/* * NEWS * */
Route::get('nieuws', 'NewsController@index');
Route::get('admin/artikels/overzicht', 'NewsController@overview')->name('news');
Route::get('admin/artikels/maken', 'NewsController@create');
Route::post('admin/artikels', 'NewsController@store');
Route::get('artikels/{id}', 'NewsController@show');
Route::get('admin/artikels/{id}/bewerken', 'NewsController@edit');
Route::patch('admin/artikels/{id}', 'NewsController@update');
Route::delete('admin/artikels/{id}', 'NewsController@destroy');

/* * SIGHTS * */
Route::get('bezienswaardigheden', 'SightsController@index');
Route::get('admin/bezienswaardigheden/overzicht', 'SightsController@overview')->name('sights');
Route::get('admin/bezienswaardigheden/maken', 'SightsController@create');
Route::post('admin/bezienswaardigheden', 'SightsController@store');
Route::get('bezienswaardigheden/{id}', 'SightsController@show');
Route::get('admin/bezienswaardigheden/{id}/bewerken', 'SightsController@edit');
Route::patch('admin/bezienswaardigheden/{id}', 'SightsController@update');
Route::delete('admin/bezienswaardigheden/{id}', 'SightsController@destroy');

/* * LINK * */
Route::get('links', 'LinkController@index');
Route::get('admin/links/overzicht', 'LinkController@overview')->name('links');
Route::get('admin/link/maken', 'LinkController@create');
Route::post('admin/links', 'LinkController@store');
Route::get('links/{id}', 'LinkController@show');
Route::get('admin/links/{id}/bewerken', 'LinkController@edit');
Route::patch('/links/{id}', 'LinkController@update');
Route::delete('admin/links/{id}', 'LinkController@destroy');






/* * GEGENEREERD DOOR Auth::routes(); * */
/* Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');*/

/* Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');*/

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');