<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\FavouriteController as FavouriteV1;

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');

Route::group(['middleware' => ['jwt.verify']], function () {

    Route::post('user', 'App\Http\Controllers\UserController@getAuthenticatedUser');

    Route::apiResource('v1/favorites', FavouriteV1::class);
});
