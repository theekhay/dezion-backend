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

Route::group(['prefix' => 'workflow'], function () {
    Route::get('/', function () {
        dd('This is the Workflow module index page. Build something great!');
    });
});


//Route::resource('workflowSteps', 'WorkflowStepsController');

//Route::resource('workflows', 'WorkflowController');
