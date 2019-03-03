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

Route::get('/finmanager', function (Request $request) {
    // return $request->finmanager();
})->middleware('auth:api');


Route::resource('cards', 'CardAPIController');

Route::resource('card_transactions', 'CardTransactionAPIController');

Route::resource('banks', 'BankAPIController');