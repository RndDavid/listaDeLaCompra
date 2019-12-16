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

Route::get('/', 'HomeController@getHome');
//Antiguas rutas de login y logout, ahora se utilizarán las rutas creadas por Laravel
/*
Route::get('logout', function () {
    return 'Logout usuario';
});

Route::get('login', function () {
    return view('auth.login');
});
*/
Route::group(['middleware'=>'auth'],function(){
    Route::get('productos', 'ProductoController@getIndex');

    Route::get('productos/show/{id}', 'ProductoController@getShow')
    ->where('id', '[0-9]+');

    Route::get('productos/create', 'ProductoController@getCreate');
    Route::post('productos/create','ProductoController@postCreate');
    Route::put('productos/comprar/{id}', 'ProductoController@putComprar')
    ->where('id','[0-9]+');
    Route::get('productos/edit/{id}', 'ProductoController@getEdit')
    ->where('id','[0-9]+');
    Route::put('productos/edit/{id}', 'ProductoController@putEdit')
    ->where('id','[0-9]+');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
