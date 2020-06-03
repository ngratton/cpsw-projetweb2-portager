<?php

use Illuminate\Http\Request;
use Illuminate\Auth;
use Illuminate\Support\Facades\Route;

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

/**
 * Profil utilisateurs
 */
// Route::middleware('auth:api')->get('/profile/{userId}', 'ProfileController@show');
// Route::middleware('auth:api')->put('/profile/{userId}', 'ProfileController@store');
// Route::middleware('auth:api')->patch('/profile/{userId}', 'ProfileController@update');
// Route::middleware('auth:api')->delete('/profile/{userId}', 'ProfileController@destroy');
Route::get('/profile/{userId}', 'ProfileController@show');
Route::put('/profile/{userId}', 'ProfileController@store');
Route::patch('/profile/{userId}', 'ProfileController@update');
Route::delete('/profile/{userId}', 'ProfileController@destroy');
