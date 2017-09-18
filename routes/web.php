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

Route::get('/emailtest', 'MailController@sendVerificationCode');

Route::post('/verification/{id}', 'VerificationController@update');
Route::post('/verification/send/{id}', 'VerificationController@sendVerificationCode');

Route::get('/home', 'HomeController@index');



Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {

    Route::get('/', 'AdminController@index');

    Route::get('/user/admins', 'UserController@indexAdmin');

    Route::resource('/user', 'UserController');


    Route::resource('/speaker', 'SpeakerController');

    Route::resource('/course/group', 'CourseGroupController');

    Route::resource('/course/type', 'CourseTypeController');

    Route::resource('/course', 'CourseController');

    Route::resource('/payment/type', 'PaymentTypeController');

    Route::resource('/payment', 'PaymentController');

    Route::resource('/reservation', 'ReservationController');

    Route::resource('/review', 'ReviewController');



});

Route::group(['middleware' => 'role:admin', 'prefix' => 'api'], function () {

    Route::get('/users', 'UserController@getUsers');

    Route::get('/admins', 'UserController@getAdmins');

    Route::get('/speakers', 'SpeakerController@getSpeakers');

    Route::get('/course/types', 'CourseTypeController@getCourseTypes');

    Route::get('/course/groups', 'CourseGroupController@getCourseGroups');

    Route::get('/courses', 'CourseController@getCourses');

    Route::get('/payment/types', 'PaymentTypeController@getPaymentTypes');

    Route::get('/payments', 'PaymentController@getPayments');

    Route::get('/reservations', 'ReservationController@getReservations');

    Route::get('/reviews', 'ReviewController@getReviews');
});
