<?php

/* ------- Public Routes ----------- */
Route::bind('guest', function($id) {
    return App\Guest::with('answer')->findOrFail($id);
});

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

    Route::get('/photos', function () {
        return view('photos');
    })->name('photos');

    Route::get('/classlist', 'DisplayController@classlist')->name('classlist');
    Route::get('/answers/{guest}', 'DisplayController@answers')->name('answers');

    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');

    Route::post('/email', 'DisplayController@email')->name('email');

    Route::get('questionnaire/answer/{qcode?}', 'QuestionnaireController@answer')
        ->name('questionnaire.answer');
    Route::get('questionnaire/resend', 'QuestionnaireController@resend')
        ->name('questionnaire.resend');
    Route::resource('questionnaire', 'QuestionnaireController', ['except' => [ 'create', 'edit','destroy' ]]);

});

/* ------- Administrator/Registered User Only Routes ----------- */
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/classmates/emails',                    'GuestsController@emails')
        ->name('classmates.emails');
    Route::get('/classmates/detail/{id}',               'GuestsController@detail')
        ->name('classmates.detail');
    Route::get('/classmates/questionnaire',             'GuestsController@questionnaire')
        ->name('classmates.questionnaire');
    Route::get('/classmates/questionnaire/resend/{guest_id}', 'GuestsController@questionnaire_resend')
        ->name('classmates.questionnaire.resend');
    Route::get('/classmates/questionnaire/resend_async/{guest_id?}', 'GuestsController@questionnaire_resend_async')
        ->name('classmates.questionnaire.resend_async');
    Route::get('/classmates/questionnaire/send', 'GuestsController@questionnaires_send')
        ->name('classmates.questionnaire.send');
    Route::get('/classmates/setstatus/{id?}/{status?}', 'GuestsController@setstatus')
        ->name('classmates.setstatus');
    Route::get('/classmates/toggle16/{id?}',            'GuestsController@toggle16')
        ->name('classmates.toggle16');
    Route::get('/classmates/status/{print?}',           'GuestsController@status')
        ->name('classmates.status');
    Route::get('/classmates/generate_qcodes/',          'GuestsController@generate_qcodes')
        ->name('classmates.generate_qcodes');
    Route::resource('/classmates', 'GuestsController');

});


