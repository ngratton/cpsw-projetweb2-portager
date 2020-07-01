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


Route::middleware('auth')->get('/administration', 'AdminController@home');


/* La route suivante est pour utiliser Vue js en SPA (work in progress) */
Route::get('/{any}', 'AppController@index')->where('any', '.*');
