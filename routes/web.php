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

    Route::resource('/user', 'UserController', ['only' => ['index', 'edit', 'store', 'create', 'update']]);

    Route::resource('/speaker', 'SpeakerController', ['only' => ['index', 'edit', 'store', 'create', 'update']]);

    Route::resource('/course/group', 'CourseGroupController', ['only' => ['index', 'edit', 'store', 'create', 'update']]);

    Route::resource('/course/type', 'CourseTypeController', ['only' => ['index', 'edit', 'store', 'create', 'update']]);

    Route::resource('/course', 'CourseController', ['only' => ['index', 'edit', 'store', 'create', 'update']]);

    Route::resource('/payment/type', 'PaymentTypeController', ['only' => ['index', 'edit', 'store', 'create', 'update']]);

    Route::resource('/payment', 'PaymentController', ['only' => ['index', 'edit', 'store', 'create', 'update']]);

    Route::resource('/reservation', 'ReservationController', ['only' => ['index', 'edit', 'store', 'create', 'update']]);

    Route::resource('/review', 'ReviewController', ['only' => ['index', 'edit', 'store', 'create', 'update']]);

});

Route::group(['middleware' => 'role:admin', 'prefix' => 'api'], function () {

    Route::get('/users', 'UserController@getUsers');

    Route::delete('/users/{ids}', 'UserController@destroy');

    Route::get('/admins', 'UserController@getAdmins');

    Route::get('/speakers', 'SpeakerController@getSpeakers');

    Route::delete('/speakers/{ids}', 'SpeakerController@destroy');

    Route::get('/course/types', 'CourseTypeController@getCourseTypes');

    Route::delete('/course/types/{ids}', 'CourseTypeController@destroy');

    Route::get('/course/groups', 'CourseGroupController@getCourseGroups');

    Route::delete('/course/groups/{ids}', 'CourseGroupController@destroy');

    Route::get('/courses', 'CourseController@getCourses');

    Route::delete('/courses/{ids}', 'CourseController@destroy');

    Route::get('/payment/types', 'PaymentTypeController@getPaymentTypes');

    Route::delete('/payment/types/{ids}', 'PaymentTypeController@destroy');

    Route::get('/payments', 'PaymentController@getPayments');

    Route::delete('/payments/{ids}', 'PaymentController@destroy');

    Route::get('/reservations', 'ReservationController@getReservations');

    Route::delete('/reservations/{ids}', 'ReservationController@destroy');

    Route::get('/reviews', 'ReviewController@getReviews');

    Route::delete('/reviews/{ids}', 'ReviewController@destroy');
});
