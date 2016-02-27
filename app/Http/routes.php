<?php

/* ------- Public Routes ----------- */
Route::model('guest', 'App\Guest');

View::composer('*', function($view){

    View::share('view_name', $view->getName());

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::controller('password', 'Auth\PasswordController', [
        'showResetForm' => 'pass.blah',
        'getReset' => 'pass.reset',
        'postReset' => 'pass.reset',
        'getEmail' => 'pass.email',
        'postEmail' => 'pass.email',
        'getBroker' => 'pass.broker'

    ]);

    Route::controller('auth', 'Auth\AuthController', [
      'getRegister' => 'auth.register',
      'getLogin' => 'auth.login',
      'postRegister' => 'auth.register',
      'postLogin' => 'auth.login',
      'postLogout' => 'auth.logout',
    ]);

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/activities', function () {
        return view('activities');
    })->name('activities');

    Route::get('/classlist', 'DisplayController@classlist')->name('classlist');
    Route::get('/answers/{guest}', 'DisplayController@answers')->name('answers');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('/email', 'DisplayController@email')->name('email');
});

/* ------- Administrator/Registered User Only Routes ----------- */
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/classmates/emails', 'GuestsController@emails')
        ->name('classmates.emails');
    Route::resource('/classmates', 'GuestsController');
    Route::get('/classmates/detail/{id}', 'GuestsController@detail')
        ->name('classmates.detail');
    Route::get('/classmates/setstatus/{id?}/{status?}', 'GuestsController@setstatus')
        ->name('classmates.setstatus');
    Route::get('/classmates/toggle16/{id?}', 'GuestsController@toggle16')
        ->name('classmates.toggle16');
});


