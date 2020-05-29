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
Route::get('/enrol', 'EnrolmentController@index');
Route::post('/enrol', 'EnrolmentController@verify');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/dashboard', 'UserController@dashboard');

    Route::get('/logout', 'UserController@logout');
});
