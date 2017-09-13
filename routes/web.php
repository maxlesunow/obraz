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
    return view('site.welcome');
});

Auth::routes();

Route::get('/whoami', 'WhoamiController@whoami');

Route::post('/verification/{id}', 'VerificationController@update');
Route::post('/verification/send/{id}', 'VerificationController@sendVerificationCode');

Route::get('/home', 'HomeController@index');



Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'AdminController@index');

    Route::resource('/user', 'UserController');
    Route::get('/user/admins', 'UserController@indexAdmin');

    Route::resource('/speaker', 'SpeakerController');
});