<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'namespace' => '\App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
Route::post("/user/search", "FriendController@searchWithEmail");
Route::post("/user/addFriend", "FriendController@addFriend");
Route::post("/user/friendList", "FriendController@friendList");
Route::post("/user/message", "MessageController@index");
Route::post("/user/send/message", "MessageController@store");