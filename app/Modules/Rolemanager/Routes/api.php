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

Route::get('/rolemanager', function (Request $request) {
    // return $request->rolemanager();
})->middleware('auth:api');


Route::group(['middleware'=> ['auth:api'], 'prefix' => 'v1'], function()
{
    Route::post("permission/create", "RoleAPIController@makePermission");

    Route::resource('roles', 'RoleAPIController');
    Route::resource('system_permissions', 'SystemPermissionAPIController');
    Route::resource('permission_categories', 'PermissionCategoryAPIController');
});




