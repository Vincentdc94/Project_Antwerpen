<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
* Bij authenticatie bij api/auth krijg je een access token. 
* Om verder te werken met de api moet je "accessToken" meegeven. 
* Hierin steek je het accessToken dat je bij auth gekregen hebt.
*/


Route::post('auth', 'ApiController@auth');


Route::resource('user', 'ApiController@user');

Route::get('/user/{id}/score', 'ApiController@getScore')->middleware('auth:api');



