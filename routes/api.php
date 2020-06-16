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
// Route::middleware('auth:api')->get('/profile/{userId}', 'ProfileController@show');   // Accès à la route d'API avec un api_token -- à voir si on utilise
Route::get('/profile/{userId}', 'ProfileController@show');              // Profile unique selon {{id}} de l'utilisateur
Route::put('/profile/{userId}', 'ProfileController@store');             // Création d'un profile
Route::patch('/profile/{userId}', 'ProfileController@update');          // Modification d'un profile
Route::delete('/profile/{userId}', 'ProfileController@destroy');        // Suppression d'un profil
Route::post('/profile/{userId}/visit', 'ProfileController@addvisit');   // Ping de visite; lorsque la méthode est appelé, ajoute incrémente automatiquement de 1

/**
 * Type de plants
 */


/**
 * Potagers
 */
Route::get('/potagers', 'PotagerController@index');                     // Ensemble des potagers
Route::get('/potager/{userId}', 'PotagerController@show');              // Potager unique lié à un utilisateur
Route::put('/potager/{userId}', 'PotagerController@store');             // Création d'un potager
Route::patch('/potager/{userId}', 'PotagerController@update');          // Modification d'un potager
Route::delete('/potager/{userId}', 'PotagerController@destroy');        // Suppression d'un potager
Route::post('/potager/{userId}/visit', 'PotagerController@addvisit');   // Ping de visite; lorsque la méthode est appelé, ajoute incrémente automatiquement de 1

/**
 * Messages
 */
Route::get('/messages', 'MessageController@index');                     // Ensemble des messages des conversations de l'usager
Route::get('/messages/{userId}/{toUserId}', 'MessageController@show');  // Ensemble des messages des conversations de l'usager avec un interlocuteur
Route::post('/messages/store', 'MessageController@store');              // envoi de messages

/**
 * Users
 */
Route::group(['prefix' => '/users', 'where' => ['user' => '[0-9]+']], function(){
    Route::get('/', 'UserController@index'); 
    Route::get('/{user}', 'UserController@show'); 
});
