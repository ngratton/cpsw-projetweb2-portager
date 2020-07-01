<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();



Route::group(['prefix' => '/administration'], function(){
    Route::middleware('auth')->get('/', 'AdminController@index');

    Route::middleware('auth')->get('/utilisateurs', 'AdminController@usersIndex');
    Route::middleware('auth')->get('/utilisateur/{userId}', 'AdminController@userShow');

    Route::middleware('auth')->get('/potagers', 'AdminController@potagersIndex');
    Route::middleware('auth')->get('/potagers/{userId}', 'AdminController@potagerShow');

    Route::middleware('auth')->get('/plants', 'AdminController@plants');

    Route::middleware('auth')->get('/echanges', 'AdminController@echangesIndex');
    Route::middleware('auth')->get('/echanges/{echangeId}', 'AdminController@echangeShow');

    Route::middleware('auth')->get('/echanges', 'AdminController@echanges');
});


/* La route suivante est pour utiliser Vue js en SPA (work in progress) */
Route::get('/{any}', 'AppController@index')->where('any', '.*');
