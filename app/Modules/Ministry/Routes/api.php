<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/ministry', function (Request $request) {
    // return $request->ministry();
})->middleware('auth:api');


Route::resource('teams', 'TeamAPIController');

Route::resource('districts', 'DistrictAPIController');