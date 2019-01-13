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

Route::get('/membership', function (Request $request) {
    // return $request->membership();
})->middleware('auth:api');

Route::post('v1/admin/login/{church_key?}', 'AdministratorAPIController@login');

Route::group(['middleware'=> ['auth:api'], 'prefix' => 'v1'], function()
{
    Route::post('members/import', 'BulkMemberImportAPIController@import');
    Route::post('members/export', 'BulkMemberImportAPIController@export');
    Route::get('member_type/members/{id}', 'MemberTypeAPIController@getMembers');
    Route::post('admin/notify/inapp', 'AdministratorAPIController@test'); //uncomment


    Route::resource('member_types', 'MemberTypeAPIController');
    Route::resource('member_details', 'MemberDetailAPIController');
    Route::resource('bulk_member_imports', 'BulkMemberImportAPIController');
    Route::resource('admin', 'AdministratorAPIController');
    Route::resource('admin_branches', 'AdminBranchAPIController');
});








