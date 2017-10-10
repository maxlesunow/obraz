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

// ========== Авторизация ==========
Route::group(['middleware' => 'guest'], function () {

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm');

    Route::post('/register', 'Auth\RegisterController@register');

    Route::post('/login', 'Auth\LoginController@login');

    Route::post('/reset-password/send-code', 'Auth\ResetPasswordController@sendVerificationCode');

    Route::post('/reset-password/check-code', 'Auth\ResetPasswordController@checkVerificationCode');

    Route::post('/verification/{id}', 'Auth\VerificationController@update');

    Route::post('/verification/send/{id}', 'Auth\VerificationController@sendVerificationCode');
});

Route::post('/logout', 'Auth\LoginController@logout');


// ========== Тест ==========
Route::get('/emailtest', 'MailController@sendVerificationCode');


// ========== Сайт ==========
Route::get('/', 'Site\PageController@home');

Route::get('/about', 'Site\PageController@about');

Route::get('/schedule', 'Site\PageController@schedule');

Route::get('/reviews', 'Site\PageController@reviews');
Route::post('/reviews', 'Site\ReviewController@store');

Route::get('/contact', 'Site\PageController@contact');

Route::get('/course/{id}/{slug?}', 'Site\CourseController@show');

Route::get('/speaker/{id}/{slug?}', 'Site\SpeakerController@show');

Route::get('/speakers', 'Site\SpeakerController@showSpeakers');


// ========== API сайт ==========
Route::group(['prefix' => 'api/site'], function () {

    Route::get('/course/groups', 'Site\CourseController@getGroups');

    Route::get('/course/types', 'Site\CourseController@getTypes');

    Route::get('/courses', 'Site\CourseController@getCourses');

    Route::get('/reservation', 'Site\ReservationController@store');

});

// ========== Онлайн оплата ==========
Route::group(['prefix' => 'payment'], function () {

    Route::get('/success', 'YandexKassaController@success');

    Route::get('/error', 'YandexKassaController@error');

    Route::get('/check', 'YandexKassaController@check');

    Route::get('/aviso', 'YandexKassaController@aviso');

    Route::get('/form', 'YandexKassaController@form');

});

// ========== Админка ==========
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

    Route::resource('/page', 'PageController', ['only' => ['index', 'edit', 'update']]);

    Route::get('/settings', 'SettingController@edit');

    Route::patch('/settings', 'SettingController@update');
});

// ========== API админка ==========
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

    Route::get('/pages', 'PageController@getPages');
});
