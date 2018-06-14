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

//Accueil
Route::view('/', 'accueil');
//Show
//Affiche tout les spectacle
Route::get('/listeSpectacle', ['as' => 'listeSpectacle', 'uses' => 'ShowController@index']);
//Retourne un spectacle
Route::get('show/{id}', ['as' => 'show', 'uses' => 'ShowController@getShow']);
//Route::get('artistes/create','ArtisteController@create');
Route::get('artistes/create', ['as' => 'fa', 'uses' => 'ArtisteController@create']);

Route::post('artistes', ['as' => 'va', 'uses' => 'ArtisteController@store']);
Route::get('artistes/{id}/edit', 'ArtisteController@edit');
Route::put('artistes/{id}', 'ArtisteController@update');
Route::delete('artistes/{id}', 'ArtisteController@destroy');
Route::get('/test/{name}', 'ArtisteController@test');

//Json
Route::get('/all.json', []);

Route::get('/adresse', ['as' => 'adresse', 'uses' => 'LocalitieController@index']);

Route::get('/rue', ['as' => 'rue', 'uses' => 'LocationController@miseajourLocation']);

Route::get('/cat', ['as' => 'cat', 'uses' => 'CategorieSpectacleController@index']);

Route::get('/ShowMjaApi', ['as' => 'UpdateShowApi', 'uses' => 'ShowController@Show_maj_api']);

Route::get('/rep', ['as' => 'UpdateRepresentationApi', 'uses' => 'representationController@miseajourRep']);

Route::get('/type', ['as' => 'type', 'uses' => 'TypeController@index']);

Route::get('/art', ['as' => 'artiste', 'uses' => 'ArtisteController@SaveFromApi']);
Route::put('ArtisteTypeShow/{id}', ['as' => 'addArTySh', 'uses' => 'ArtisteController@apiArtisteTypeShow']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




//admin
Route::get('/admin', ['as'=>'admin','uses'=>'ShowController@adminApi']);
Route::post('/admin',['as'=>'admin','uses'=>'ShowController@addShow']);
