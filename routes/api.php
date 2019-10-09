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

//Route::get('/login', 'OauthController@showLoginForm');
//Route::post('/login', 'OauthController@login');



Route::post('/register', 'OauthController@register');

Route::get('/getuser/{api_key}', 'OauthController@getUser');
Route::get('/test', 'OauthController@test');



