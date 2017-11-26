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

Route::group(['prefix' => 'users'], function () {
    //注册
    Route::post('mobile_register', 'UserController@mobile_register');
    // 发送手机验证码
    Route::post('send_mobile_reg_code', 'UserController@send_mobile_reg_code');
    Route::post('email_register', 'UserController@email_register');
    Route::post('send_email_reg_code', 'UserController@send_email_reg_code');
    //登陆
    Route::post('login', 'UserController@login');
    //获取自己的信息
    Route::get('show', 'UserController@show');
    Route::post('update', 'UserController@update');
    Route::post('avatar', 'UserController@avatar');
    //获取用户列表
    Route::post('index','UserController@index');
});

Route::group(['prefix' => 'informations'], function () {
    Route::post('store', 'InformationController@store');
    Route::post('update', 'InformationController@update');
    Route::get('index', 'InformationController@index');
    Route::get('show/{id}', 'InformationController@show');
    Route::delete('delete/{id}', 'InformationController@delete');
});