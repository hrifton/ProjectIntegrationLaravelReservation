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



//Artites
Route::get('/',[
	'as'=>'index',
	'uses'=>'ArtisteController@index']);


//Route::get('artistes/create','ArtisteController@create');
Route::get('artistes/create',[
'as'=>'fa',
'uses'=>'ArtisteController@create'
]);


Route::post('artistes',[
	'as'=>'va',
	'uses'=>'ArtisteController@store']);
Route::get('artistes/{id}/edit','ArtisteController@edit');


Route::put('artistes/{id}','ArtisteController@update');
Route::delete('artistes/{id}','ArtisteController@destroy');
Route::get('/test/{name}','ArtisteController@test');

//

//Json
Route::get('/all.json',[
]);

Route::get('/listePieces',[
    'as'=>'ListPiece',
    'uses'=>'ListePiecesController@index'
]);

Auth::routes();

