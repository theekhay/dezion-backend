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

Route::get('/servicemanager', function (Request $request) {
    // return $request->servicemanager();
})->middleware('auth:api');

Route::group(['middleware'=> ['auth:api'], 'prefix' => 'v1'], function()
{
    Route::resource('services', 'ServiceAPIController');
    Route::resource('service_data_category', 'ServiceDataCategoryAPIController');
    Route::resource('service_data_components', 'ServiceDataComponentAPIController');
    Route::resource('service_data_category_provisions', 'ServiceDataCategoryProvisionAPIController');
   // Route::resource('service_data_component_provisions', 'ServiceDataComponentProvisionAPIController');
});






