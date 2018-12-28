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

Route::get('/core', function (Request $request) {
    // return $request->core();
})->middleware('auth:api');

Route::group(['middleware'=> ['auth:api'], 'prefix' => 'v1'], function()
{
    Route::get('churches/test', 'ChurchAPIController@test');
    Route::post('churches/register', 'ChurchAPIController@registerChurch');

    Route::resource('churches', 'ChurchAPIController');
    Route::resource('branches', 'BranchAPIController');
});



