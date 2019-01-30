<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'ministry'], function () {
    Route::get('/', function () {
        dd('This is the Ministry module index page. Build something great!');
    });
});


Route::resource('teams', 'TeamController');

Route::resource('districts', 'DistrictController');

Route::resource('cells', 'CellController');

Route::resource('communities', 'CommunityController');

Route::resource('zones', 'ZoneController');