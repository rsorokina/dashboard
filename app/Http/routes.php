<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    //Session::forget('dashboard');
    return view('dashboard');
});


Route::get('/news', function () {
    return view('widgets.news');
});

Route::get('/bar', function () {
    return view('widgets.bar');
});


Route::post('/set-dashboard', function () {
    Session::put('dashboard', Request::input('dashboard'));
    return Response::json(['dashboard'=> Session::get('dashboard')]);
});

Route::get('/get-dashboard', function () {
    return Response::json(['dashboard'=> Session::get('dashboard')]);
});