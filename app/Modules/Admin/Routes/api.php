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

Route::get('/admin', function (Request $request) {
    // return $request->admin();
})->middleware('auth:api');



Route::group(['prefix' => 'v1'], function()
{
    //Route::post('v1/admin/login/{church_key?}', 'AdministratorAPIController@login');
    Route::post('admin/login', 'AdministratorAPIController@login')->middleware(['checkadminstatus']);

    Route::post('admin/branch/create/{church_key}', 'AdministratorAPIController@branchAdminSignup');


});


Route::group(['middleware'=> ['auth:api'], 'prefix' => 'v1'], function()
{
    Route::get('admin/logout', 'AdministratorAPIController@logout') ;

    Route::post('admin/notify/inapp', 'AdministratorAPIController@test'); //unomment

    //create a new branch admin

    Route::post('admin/branch/create', 'AdministratorAPIController@makeBranchAdmin');

    Route::resource('admin', 'AdministratorAPIController');
    Route::resource('admin_branches', 'AdminBranchAPIController');
});
