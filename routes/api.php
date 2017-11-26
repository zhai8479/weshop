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

Route::middleware('jwt.auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'user', 'middleware' => 'api'], function () {
    //注册
    Route::post('register', 'UserController@register');
    //登陆
    Route::post('login', 'UserController@login');
    //获取自己的信息
    Route::group(['middleware' => 'jwt.api.auth:jwt.refresh'], function () {
        Route::get('show', 'UserController@show');
        Route::post('update', 'UserController@update');
        Route::post('avatar', 'UserController@avatar');
    });
    Route::post('index','UserController@index');
});