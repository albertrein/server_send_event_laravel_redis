<?php
use App\Http\Controllers\ServerSentEvents;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/stream_user_page', function () {
    return view('stream_user_page');
});


Route::get('/stream', [ServerSentEvents::class, 'stream']);

