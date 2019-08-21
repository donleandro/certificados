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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//evento Routes
Route::group(['middleware'=> 'web'],function(){
  Route::resource('evento','\App\Http\Controllers\EventoController');
  Route::post('evento/{id}/update','\App\Http\Controllers\EventoController@update');
  Route::get('evento/{id}/delete','\App\Http\Controllers\EventoController@destroy');
  Route::get('evento/{id}/deleteMsg','\App\Http\Controllers\EventoController@DeleteMsg');
});
