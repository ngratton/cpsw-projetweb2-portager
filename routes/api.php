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

Route::post('inscription', 'InscriptionController@inscription');
Route::post('/connexion', 'ConnexionController@connexion');
Route::post('/deconnexion', 'ConnexionController@deconnexion');

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
Route::get('/type-plants/all', 'TypeController@index');                 // Obtenir l'ensemble des types de plants


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
 * Plants
 */
Route::get('/plants', 'PlantController@index');                         // Affichage de tous les plants
Route::get('/plant/{plantId}', 'PlantController@show');                      // Création d'un plant
Route::put('/plant/new', 'PlantController@store');                      // Création d'un plant
Route::patch('/plant/{plantId}', 'PlantController@update');                      // Création d'un plant
Route::delete('/plant/{plantId}', 'PlantController@destroy');                      // Création d'un plant
Route::post('/plant/{plantId}/visit', 'PlantController@addvisit');                      // Création d'un plant


/**
 * Rating - profil
 */
Route::get('/evaluation/profiles', 'RatingProfileController@index');
Route::get('/evaluation/profile/{profileId}', 'RatingProfileController@show');
Route::get('/evaluation/profile/avg/{profileId}', 'RatingProfileController@average');
Route::put('/evaluation/profile/{userId}/{profileId}', 'RatingProfileController@store');
Route::delete('/evaluation/profile/{commentId}', 'RatingProfileController@destroy');

/**
 * Rating - Potager
 */
Route::get('/evaluation/potager/{potagerId}', 'RatingPotagerController@index');
Route::get('/evaluation/potager/{potagerId}', 'RatingProfileController@show');
Route::get('/evaluation/potager/avg/{potagerId}', 'RatingProfileController@average');
Route::put('/evaluation/potager/{userId}/{potagerId}', 'RatingPotagerController@store');
Route::delete('/evaluation/potager/{commentId}', 'RatingPotagerController@destroy');

/**
 * Rating - Plant
 */
Route::get('/evaluation/plant/{plantId}', 'RatingPlantController@index');
Route::get('/evaluation/plant/{plantId}', 'RatingPlantController@show');
Route::put('/evaluation/plant/{userId}/{plantId}', 'RatingPlantController@store');
Route::delete('/evaluation/plant/{commentId}', 'RatingPlantController@destroy');
