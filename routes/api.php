<?php

use Illuminate\Http\Request;
use App\Http\Controllers\RedisController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stream/send_info', 'RedisController@setInfo');

Route::get('stream/get_info', 'RedisController@getInfo');