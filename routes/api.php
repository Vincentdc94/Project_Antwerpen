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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/gettoken', 'ApiController@getToken');
Route::middleware('auth:api')->get('/admin', 'ApiController@apiAdmin');

Route::middleware('auth:api')->get('/user/{id}/score', function($id){
    $user = App\User::find($id);

    return response()->json($user->scores);
});

// Route::middleware('auth:api')->post('/user/{id}/score', function($id){
//     $user = App\User::find($id);
// });