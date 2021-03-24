<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// auth
Route::post('/login', 'API\UserController@login');
Route::post('/register', 'API\UserController@register');
Route::put('/edit_profile/{id}', 'API\UserController@edit_profile');

//profile
Route::get('/profile/{id}', 'API\UserController@get_profile');
Route::put('/update_profile/{id}', 'API\UserController@update_profile');

//get province
Route::get('/province', 'API\UserController@get_province');

//create event
Route::get('/show_all', 'API\CreateEventController@show_all');
Route::get('/show_event/{id}', 'API\CreateEventController@show_event');
Route::post('/create_event/{id}', 'API\CreateEventController@create_event');
Route::delete('/delete_event/{id}', 'API\CreateEventController@delete_event');