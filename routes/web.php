<?php

use Illuminate\Support\Facades\Route;

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
    return view('landing');
});

Route::get('/login','UserController@loginForm')->name('login');
Route::post('/login','UserController@login');

Route::get('/enrol/create/{student}', 'EnrolmentController@create');
Route::post('/enrol/store', 'EnrolmentController@store');
Route::get('/enrol/{enrol}', 'EnrolmentController@review');
Route::get('/registration', 'StudentController@create');
Route::post('/registration', 'StudentController@store');
Route::get('/enrol', 'EnrolmentController@index');
Route::post('/enrol/verify', 'EnrolmentController@verify');

Route::get('/status', 'EnrolmentController@status');
Route::post('/status', 'EnrolmentController@accessStatus');

Route::get('/payment-channels', 'SiteController@paymentChannels');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/dashboard', 'UserController@dashboard');

    Route::get('/logout', 'UserController@logout');

    Route::get('/backend/enrol/{enrol}', 'EnrolmentController@show');

    Route::post('/verify-payment', 'EnrolmentController@verifyPayment')->middleware('finance');

    Route::get('/backend/student/{student}', 'StudentController@view');

    Route::get('/backend/process/{enrol}', 'EnrolmentController@process');

    Route::post('/backend/process/{enrol}', 'EnrolmentController@finalize');

    Route::group(['middleware'=>'registrar'], function() {
        Route::post('/backend/student/{student}/update-id','StudentController@updateID');
        Route::post('/verify-records', 'EnrolmentController@verifyRecords');
    });

    Route::group(['middleware'=>'admin'], function() {
        Route::get('/users','UserController@index');
    });

});
