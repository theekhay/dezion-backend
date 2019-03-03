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

Route::get('/memberlocationmapping', function (Request $request) {
    // return $request->memberlocationmapping();
})->middleware('auth:api');

Route::group(['middleware'=> ['auth:api'], 'prefix' => 'v1'], function()
{
    Route::resource('model_address_proximities', 'ModelAddressProximityAPIController');
});



