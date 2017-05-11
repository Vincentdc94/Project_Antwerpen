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
Route::get('admin', 'PagesController@adminDashBoard')->middleware('admin');
Route::get('tim', 'PagesController@tim')->middleware('guest');
Route::post('zoeken', 'SearchController@searchAll');

/* * SESSIONS * */
Route::get('profiel', 'SessionsController@show')->middleware('auth');
Route::post('profiel/{id}/foto/maken', 'SessionsController@pikUpload');
Route::patch('profiel', 'SessionsController@update')->middleware('auth');
Route::get('login', 'SessionsController@create')->middleware('guest');
Route::post('login', 'SessionsController@store')->middleware('guest');
Route::get('logout', 'SessionsController@destroy');

/* * REGISTRATION * */
Route::get('admin/gebruikers/overzicht', 'RegistrationsController@overview')->middleware('admin');
Route::get('registreer', 'RegistrationsController@create')->middleware('guest');
Route::post('registreer', 'RegistrationsController@store')->middleware('guest');
Route::patch('admin/gebruikers/{id}', 'RegistrationsController@update')->middleware('admin');

/* * MEDIA* */
Route::post('media/upload', 'MediaController@store');
Route::post('media/delete', 'MediaController@delete');

/* * SCHOOLS * */
Route::get('scholen', 'SchoolsController@index');
Route::get('admin/scholen/overzicht', 'SchoolsController@overview')->middleware('admin');
Route::get('admin/scholen/maken', 'SchoolsController@create')->middleware('admin');
Route::post('scholen', 'SchoolsController@store')->middleware('admin');
Route::get('scholen/{id}', 'SchoolsController@show');
Route::get('admin/scholen/{id}/bewerken', 'SchoolsController@edit')->middleware('admin');
Route::patch('admin/scholen/{id}', 'SchoolsController@update')->middleware('admin');
Route::delete('admin/scholen/{id}', 'SchoolsController@destroy')->middleware('admin');

/* * CAMPI * */
Route::get('campussen', 'CampiController@index');
Route::get('admin/campussen/overzicht', 'CampiController@overview')->middleware('admin');
Route::get('admin/campussen/maken', 'CampiController@create')->middleware('admin');
Route::post('admin/campussen', 'CampiController@store')->middleware('admin');
Route::get('campussen/{id}', 'CampiController@show');
Route::get('admin/campussen/{id}/bewerken', 'CampiController@edit')->middleware('admin');
Route::patch('campussen/{id}', 'CampiController@update')->middleware('admin');
Route::delete('admin/campussen/{id}', 'CampiController@destroy')->middleware('admin');

/* * TESTIMONIALS * */
Route::get('getuigenissen', 'TestimonialsController@index');
Route::get('admin/getuigenissen/overzicht', 'TestimonialsController@overview')->middleware('admin');
Route::get('getuigenissen/maken', 'TestimonialsController@create')->middleware('admin');
Route::post('getuigenissen', 'TestimonialsController@store')->middleware('admin');
Route::get('getuigenissen/{id}', 'TestimonialsController@show');
Route::get('admin/getuigenissen/{id}/bewerken', 'TestimonialsController@edit')->middleware('admin');
Route::patch('admin/getuigenissen/{id}', 'TestimonialsController@update')->middleware('admin');
Route::delete('admin/getuigenissen/{id}', 'TestimonialsController@destroy')->middleware('admin');

/* * NEWS * */
Route::get('nieuws', 'NewsController@index');
Route::get('admin/artikels/overzicht', 'NewsController@overview')->middleware('admin');
Route::get('admin/artikels/maken', 'NewsController@create')->middleware('admin');
Route::post('admin/artikels', 'NewsController@store')->middleware('admin');
Route::get('artikels/{id}', 'NewsController@show');
Route::get('admin/artikels/{id}/bewerken', 'NewsController@edit')->middleware('admin');
Route::patch('admin/artikels/{id}', 'NewsController@update')->middleware('admin');
Route::delete('admin/artikels/{id}', 'NewsController@destroy')->middleware('admin');

/* * SIGHTS * */
Route::get('bezienswaardigheden', 'SightsController@index');
Route::get('admin/bezienswaardigheden/overzicht', 'SightsController@overview')->middleware('admin');
Route::get('admin/bezienswaardigheden/maken', 'SightsController@create')->middleware('admin');
Route::post('admin/bezienswaardigheden', 'SightsController@store')->middleware('admin');
Route::get('bezienswaardigheden/{id}', 'SightsController@show');
Route::get('admin/bezienswaardigheden/{id}/bewerken', 'SightsController@edit')->middleware('admin');
Route::patch('admin/bezienswaardigheden/{id}', 'SightsController@update')->middleware('admin');
Route::delete('admin/bezienswaardigheden/{id}', 'SightsController@destroy')->middleware('admin');

/* * LINK * */
Route::get('links', 'LinkController@index');
Route::get('admin/links/overzicht', 'LinkController@overview')->middleware('admin');
Route::get('admin/link/maken', 'LinkController@create')->middleware('admin');
Route::post('admin/links', 'LinkController@store')->middleware('admin');
Route::get('links/{id}', 'LinkController@show');
Route::get('admin/links/{id}/bewerken', 'LinkController@edit')->middleware('admin');
Route::patch('admin/links/{id}', 'LinkController@update')->middleware('admin');
Route::delete('admin/links/{id}', 'LinkController@destroy')->middleware('admin');






/* * GEGENEREERD DOOR Auth::routes(); * */
//Authentication Routes...
Route::get('login', 'SessionsController@Create')->name('login')->middleware('guest');
//Route::post('login', 'Auth\LoginController@login');
//Route::post('logout', 'Auth\LoginController@logout')->name('logout');*/

/* Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');*/

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');