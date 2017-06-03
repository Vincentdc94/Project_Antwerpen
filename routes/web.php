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
Route::get('admin', 'PagesController@adminDashBoard')->middleware('role:admin,approver,editor');
Route::get('introductie', 'PagesController@tim')->middleware('guest');
Route::get('zoeken/{keyword}', 'SearchController@searchAll');
Route::get('scorebord', 'RegistrationsController@index');
Route::get('404', 'PagesController@notFound');

/* * SESSIONS * */
Route::get('profiel', 'SessionsController@show');
Route::post('profiel/{id}/foto/maken', 'SessionsController@pikUpload');
Route::patch('profiel', 'SessionsController@update')->middleware('auth');
Route::get('login', 'SessionsController@create')->middleware('guest');
Route::post('login', 'SessionsController@store')->middleware('guest');
Route::get('logout', 'SessionsController@destroy');

/* * REGISTRATION * */
Route::get('admin/gebruikers/overzicht', 'RegistrationsController@overview')->middleware('role:admin');
Route::get('registreer', 'RegistrationsController@create')->middleware('guest');
Route::post('registreer', 'RegistrationsController@store')->middleware('guest');
Route::patch('admin/gebruikers/{id}', 'RegistrationsController@update')->middleware('role:admin');

/* * MEDIA* */
Route::post('media/upload', 'MediaController@store');
Route::post('media/delete', 'MediaController@delete');
Route::get('media/all', 'MediaController@all');

/* * SCHOOLS * */
Route::get('scholen', 'SchoolsController@index');
Route::get('admin/scholen/overzicht', 'SchoolsController@overview')->middleware('role:admin,approver,editor');
Route::get('admin/scholen/maken', 'SchoolsController@create')->middleware('role:admin,editor');
Route::post('scholen', 'SchoolsController@store')->middleware('role:admin');
Route::get('scholen/{id}', 'SchoolsController@show');
Route::get('admin/scholen/{id}/bewerken', 'SchoolsController@edit')->middleware('role:admin');
Route::get('admin/opleidingen/school/{id}', 'SchoolsController@opleidingen')->middleware('role:admin');
Route::post('admin/scholen/{id}', 'SchoolsController@update')->middleware('role:admin');
Route::delete('admin/scholen/{id}', 'SchoolsController@destroy')->middleware('role:admin');

/* * CAMPI * */
Route::get('campussen', 'CampiController@index');
Route::get('admin/campussen/overzicht', 'CampiController@overview')->middleware('role:admin,approver,editor');
Route::get('admin/campussen/maken', 'CampiController@create')->middleware('role:admin,editor');
Route::post('admin/campussen', 'CampiController@store')->middleware('role:admin');
Route::get('campussen/{id}', 'CampiController@show');
Route::get('admin/campussen/{id}/bewerken', 'CampiController@edit')->middleware('role:admin');
Route::patch('campussen/{id}', 'CampiController@update')->middleware('role:admin');
Route::delete('admin/campussen/{id}', 'CampiController@destroy')->middleware('role:admin');

/* * TESTIMONIALS * */
Route::get('getuigenissen', 'TestimonialsController@index');
Route::get('admin/getuigenissen/overzicht', 'TestimonialsController@overview')->middleware('role:admin,editor');
Route::get('getuigenissen/maken', 'TestimonialsController@create')->middleware('auth');
Route::post('getuigenissen', 'TestimonialsController@store')->middleware('auth');
Route::get('getuigenissen/{id}', 'TestimonialsController@show');
Route::get('admin/getuigenissen/{id}/bewerken', 'TestimonialsController@edit')->middleware('role:admin');
Route::patch('admin/getuigenissen/{id}', 'TestimonialsController@update')->middleware('role:admin');
Route::delete('admin/getuigenissen/{id}', 'TestimonialsController@destroy')->middleware('role:admin');

/* * NEWS * */
Route::get('nieuws', 'NewsController@index');
Route::get('admin/artikels/overzicht', 'NewsController@overview')->middleware('role:admin,approver,editor');
Route::get('admin/artikels/maken', 'NewsController@create')->middleware('role:admin,editor');
Route::post('admin/artikels', 'NewsController@store')->middleware('role:admin,editor');
Route::get('artikels/{id}', 'NewsController@show');
Route::get('admin/artikels/{id}/bewerken', 'NewsController@edit')->middleware('role:admin,editor');
Route::patch('admin/artikels/{id}', 'NewsController@update')->middleware('role:admin,editor');
Route::delete('admin/artikels/{id}', 'NewsController@destroy')->middleware('role:admin');

/* * SIGHTS * */
Route::get('bezienswaardigheden', 'SightsController@index');
Route::get('admin/bezienswaardigheden/overzicht', 'SightsController@overview')->middleware('role:admin,approver,editor');
Route::get('admin/bezienswaardigheden/maken', 'SightsController@create')->middleware('role:admin,editor');
Route::post('admin/bezienswaardigheden', 'SightsController@store')->middleware('role:admin,editor');
Route::get('bezienswaardigheden/{id}', 'SightsController@show');
Route::get('bezienswaardigheden/{id}/media', 'SightsController@media');
Route::get('admin/bezienswaardigheden/{id}/bewerken', 'SightsController@edit')->middleware('role:admin,editor');
Route::patch('admin/bezienswaardigheden/{id}', 'SightsController@update')->middleware('role:admin,editor');
Route::delete('admin/bezienswaardigheden/{id}', 'SightsController@destroy')->middleware('role:admin');

/* * LINK * */
Route::get('links', 'LinkController@index');
Route::get('admin/links/overzicht', 'LinkController@overview')->middleware('role:admin,editor,approver');
Route::get('admin/link/maken', 'LinkController@create')->middleware('role:admin,editor');
Route::post('admin/links', 'LinkController@store')->middleware('role:admin,editor');
Route::get('links/{id}', 'LinkController@show');
Route::get('admin/links/{id}/bewerken', 'LinkController@edit')->middleware('role:admin,editor');
Route::patch('admin/links/{id}', 'LinkController@update')->middleware('role:admin,editor');
Route::delete('admin/links/{id}', 'LinkController@destroy')->middleware('role:admin');


/* * APPROVER * */
Route::get('admin/artikels/{id}/beoordelen', 'NewsController@approverShow')->middleware('role:approver,admin');
Route::patch('admin/artikels/{id}/beoordelen', 'NewsController@approverUpdate')->middleware('role:approver,admin');

/* * PROMO * */
Route::get('game/promo', function(){
    return view('promo');
});




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