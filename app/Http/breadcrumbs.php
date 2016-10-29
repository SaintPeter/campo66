<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > Questionnaire
Breadcrumbs::register('questionnaire.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Questionnaire', route('questionnaire.index'));
});

// Home > Questionnaire > Answer
Breadcrumbs::register('questionnaire.answer', function($breadcrumbs)
{
    $breadcrumbs->parent('questionnaire.index');
    $breadcrumbs->push('Answer Questionaire', route('questionnaire.answer'));
});

// Home > Class List
Breadcrumbs::register('classlist', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Class List', route('classlist'));
});

// Home > Activities
Breadcrumbs::register('activities', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Activities', route('activities'));
});

// Home > Photos
Breadcrumbs::register('photos', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Photos', route('photos'));
});

// Home > Class List > Guest
Breadcrumbs::register('answers', function($breadcrumbs, $guest)
{
    $breadcrumbs->parent('classlist');
    $breadcrumbs->push($guest->full_name . '\'s Answers', route('answers', $guest->id));
});

// Home > Guests
Breadcrumbs::register('classmates.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Classmates', route('classmates.index'));
});

// Home > Guests > Emails
Breadcrumbs::register('classmates.emails', function($breadcrumbs)
{
    $breadcrumbs->parent('classmates.index');
    $breadcrumbs->push('E-mails', route('classmates.emails'));
});

// Home > Guests
Breadcrumbs::register('classmates.create', function($breadcrumbs)
{
    $breadcrumbs->parent('classmates.index');
    $breadcrumbs->push('Add Classmate', route('classmates.create'));
});

// Home > Classmates > Status
Breadcrumbs::register('classmates.status', function($breadcrumbs)
{
    $breadcrumbs->parent('classmates.index');
    $breadcrumbs->push('Classmate Status', route('classmates.status'));
});

// Home > Classmates > Questionnaire
Breadcrumbs::register('classmates.questionnaire', function($breadcrumbs)
{
    $breadcrumbs->parent('classmates.index');
    $breadcrumbs->push('Questionnaires', route('classmates.questionnaire'));
});

// Home > Contact Us
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact Us', route('contact'));
});