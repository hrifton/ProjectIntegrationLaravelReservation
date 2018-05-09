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

Route::get('/', function () {
    return view('accueil');
});

//Artites
Route::get('artistes','ArtisteController@index');
Route::get('artistes/create','ArtisteController@create');
Route::post('artistes','ArtisteController@store');
Route::get('artistes/{id}/edit','ArtisteController@edit');
Route::put('artistes/{id}','ArtisteController@update');
Route::delete('artistes/{id}','ArtisteController@destroy');


//




Auth::routes();

