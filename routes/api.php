<?php

use Illuminate\Http\Request;

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

Route::group(['middleware'=>'cors', 'as' => 'api'],function(){

    Route::post('access-token','Api\AuthController@accessToken')->name('access-token');
    Route::post('refresh-token','Api\AuthController@refreshToken')->name('refresh-token');

    Route::group(['middleware'=>'auth:api'],function(){
        Route::get('/user', function (Request $request) {
            $user = $request->user('api');
            return $user;
        })->middleware('auth:api')->name('user');


        Route::post('/logout','Api\AuthController@logout')->middleware('auth:api')->name('logout');
    });

});