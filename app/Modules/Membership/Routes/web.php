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

Route::group(['prefix' => 'membership'], function () {
    Route::get('/', function () {
        dd('This is the Membership module index page. Build something great!');
    });
});


Route::resource('memberTypes', 'MemberTypeController');

Route::resource('memberDetails', 'MemberDetailController');

Route::resource('bulkMemberImports', 'BulkMemberImportController');

Route::resource('administrators', 'AdministratorController');

Route::resource('adminBranches', 'AdminBranchController');