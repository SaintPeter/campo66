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

    Route::get('/classlist', 'DisplayController@classlist')->name('classlist');
    Route::get('/answers/{guest}', 'DisplayController@answers')->name('answers');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('/email', 'DisplayController@email')->name('email');
});

/* ------- Administrator/Registered User Only Routes ----------- */
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('/guests', 'GuestsController');
    Route::get('/guests/detail/{id}', 'GuestsController@detail')
        ->name('guests.detail');
    Route::get('/guests/setstatus/{id?}/{status?}', 'GuestsController@setstatus')
        ->name('guests.setstatus');
    Route::get('/guests/toggle16/{id?}', 'GuestsController@toggle16')
        ->name('guests.toggle16');
});


