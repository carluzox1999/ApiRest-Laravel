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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/post/', 'App\Http\Controllers\PostController@index')->name('api.post');
Route::get('/post/{id}', 'App\Http\Controllers\PostController@show')->name('api.show');
Route::get('/help/', 'App\Http\Controllers\PostController@help')->name('api.help');
