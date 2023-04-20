<?php

use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'App\Http\Controllers\AuthController@register');
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'task'

], function ($router) {

    Route::get('getalltask', 'App\Http\Controllers\TaskController@getAllTask');
    Route::post('addtask', 'App\Http\Controllers\TaskController@addTask');
    Route::put('updatetask/{id}', 'App\Http\Controllers\TaskController@updateTask');
    Route::delete('deletetask/{id}', 'App\Http\Controllers\TaskController@deleteTask');
});
