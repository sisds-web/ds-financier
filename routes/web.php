<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * Rota para redirecionar para /admin/home caso url seja /home no momento que o usuario
 * esta logado
 */
Route::get('/home', function(){
    return redirect()->route('admin.home');
});


Route::get('/app', function () {
    return view('layouts.spa');
});

/**
 * Grupo para rota admin
 */
Route::group(['prefix'=>'admin','as'=>'admin.'],function(){

    Auth::routes();

    Route::group(['middleware'=>'can:access-admin'], function(){
        Route::get('/home', 'HomeController@index')->name('home');
    });
});
