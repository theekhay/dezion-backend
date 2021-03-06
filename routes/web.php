<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('admin/email/verify/{id}', 'API\Auth\VerificationController@verify')->name('api.verification.verify');

//Route::get('/home', 'HomeController@index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
