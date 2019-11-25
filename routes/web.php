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


Route::get('users/export', 'UsersController@export');
Route::get('/', 'UsersController@homeselect');
Route::get('test', 'UsersController@exportPreview');

Route::group(array('before'=>'csrf'), function () {
    Route::post('handle', 'UsersController@handleInquiry');
});
Route::get('CallToSelf', function () {
    return redirect('http://qes.gesis.intra:8001/');
});//THIS IS HOW WE ARE CALLED FROM MAIN APP