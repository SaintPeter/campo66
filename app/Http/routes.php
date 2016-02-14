<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/classlist', 'DisplayController@classlist')->name('classlist');
    Route::get('/answers/{id}', 'DisplayController@answers')->name('answers');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('/email', 'DisplayController@email')->name('email');
});





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('/guests', 'GuestsController');
    Route::get('/guests/detail/{id}', 'GuestsController@detail')
        ->name('guests.detail');
    Route::get('/guests/setstatus/{id?}/{status?}', 'GuestsController@setstatus')
        ->name('guests.setstatus');
    Route::get('/guests/toggle16/{id?}', 'GuestsController@toggle16')
        ->name('guests.toggle16');
});


