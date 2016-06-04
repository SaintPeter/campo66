@extends('layouts.master')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">

@if(isset($answers->id))
{{-- Edit an existing questionnaire --}}
    <div class="row">
        <h1>Edit Questionnaire</h1>
    </div>
    {!! Form::model($answers, [
        'method' => 'PATCH',
        'route' => ['questionnaire.update', $answers->id],
        'class' => 'form'
    ]) !!}
@else
{{-- Save a new questionnaire --}}
    <div class="row">
        <h1>Answer Questionnaire</h1>
    </div>
    {!! Form::model($answers, [
        'method' => 'post',
        'route' => ['questionnaire.store'],
        'class' => 'form'
    ]) !!}
@endif

{!! Form::hidden('qcode', $qcode) !!}
<div class="row">
    Questionnaire for {{ $guest->first_name }} {{ $guest->last_name }}
</div>

<div class="row">
    <h2>Update Personal Information</h2>
    <p>Information in this section will only be made public if you explictly allow it.</p>
    <div class="form-group">
        <div class="col-md-4 col-sm-6">
            <label for="married_name">Married Name</label>
            {!! Form::text('married_name', null, [ 'class' => 'form-control' ]) !!}
        </div>
        <div class="col-md-8 col-sm-6"></div>
    </div>

    <div class="col-xs-12">&nbsp;</div>

    <div class="address_group">
        <div class="form-group">
            <div class="col-md-6 col-sm-12">
                <label for="address1">Address 1</label>
                {!! Form::text('address1', null, [ 'class' => 'form-control' ]) !!}
             </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-sm-12">
            <label for="address2">Address 2</label>
            {!! Form::text('address2', null, [ 'class' => 'form-control' ]) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-sm-12">
            <label for="city">City</label>
            {!! Form::text('city', null, [ 'class' => 'form-control' ]) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-2 col-sm-6">
            <label for="state">State</label>
            {!! Form::text('state', null, [ 'class' => 'form-control' ]) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4 col-sm-6">
            <label for="zip">Zip</label>
            {!! Form::text('zip', null, [ 'class' => 'form-control' ]) !!}
            </div>
        </div>
    </div>

   <div class="form-group col-xs-4">
        <label for="public_address">Make Address Public?</label>
        {!! Form::select('public_address', ['0' => 'Private', '1' => 'Public'],  null, [ 'class' => 'form-control' ]) !!}
    </div>

    <div class="col-xs-12">&nbsp;</div>
    @for($i = 1; $i < 4; $i++)
    <div class="form-group margin">
        <div class="col-md-3 col-sm-3 col-xs-6">
            <label for="phone{{ $i }}">Phone {{ $i }}</label>
            {!! Form::text('phone' . $i, null, [ 'class' => 'form-control' ]) !!}
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
            <label for="phone{{ $i }}type">Type {{ $i }}</label>
            <div class="input-group">
                {!! Form::text('phone' . $i . 'type', null, [ 'class' => 'form-control' ]) !!}
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a class="phonetype" href="#">Home</a></li>
                        <li><a class="phonetype" href="#">Work</a></li>
                        <li><a class="phonetype" href="#">Mobile</a></li>
                    </ul>
                </div><!-- /btn-group -->
            </div>
        </div>
    </div>
    @endfor


    <div class="col-xs-6 hidden-sm">
    &nbsp;
    </div>

    <div class="form-group col-xs-4">
        <label for="public_phone">Make Phone Numbers Public?</label>
        {!! Form::select('public_phone', ['0' => 'Private', '1' => 'Public'],  null, [ 'class' => 'form-control' ]) !!}
    </div>

    <div class="col-xs-12">&nbsp;</div>

    <div class="form-group">
        <div class="col-md-4 col-sm-6">
        <label for="email">Email 1</label>
        {!! Form::text('email', null, [ 'class' => 'form-control' ]) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-4 col-sm-6">
        <label for="email2">Email 2</label>
        {!! Form::text('email2', null, [ 'class' => 'form-control' ]) !!}
        </div>
    </div>

    <div class="form-group col-xs-4">
        <label for="public_email">Make e-mail Address Public?</label>
        {!! Form::select('public_email', ['0' => 'Private', '1' => 'Public'],  null, [ 'class' => 'form-control' ]) !!}
    </div>

</div>

<div class="row">
    <h2>Questionnaire</h2>
</div>

<div class="row">
    <div class="form-group form-element col-xs-12">
    <label for="moved">Estimated number of times you have moved?</label>
    {!! Form::text('moved', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="furthest">Furthest residence you have lived since graduating?</label>
    {!! Form::text('furthest', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="schooling">Schooling past high school?</label>
    {!! Form::text('schooling', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="book">Have you had a book published?</label>
    {!! Form::text('book', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="coolestjob">What was your coolest job?</label>
    {!! Form::text('coolestjob', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="occupation">What has been your predominate occupation - how would you describe it?</label>
    {!! Form::textarea('occupation', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="retired">Are you retired?</label>
    {!! Form::select('retired', ['No', 'Yes'],  null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="retired_date">Retirement Date:</label>
    {!! Form::date('retired_date', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="children">Number of children and their ages:</label>
    {!! Form::textarea('children', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="grandchildren">Number of grandchildren and their ages:</label>
    {!! Form::textarea('grandchildren', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="greatgrandchildren">Number of great grantchildren and their ages:</label>
    {!! Form::textarea('greatgrandchildren', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="countries">What countries have you visited?</label>
    {!! Form::textarea('countries', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="furthest_country">What is the furthest country you have visited?</label>
    {!! Form::text('furthest_country', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="highlights">What are the highlights of your life?</label>
    {!! Form::textarea('highlights', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="achievement">What achievement or personal record are you proud of?</label>
    {!! Form::textarea('achievement', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-xs-12">
    <label for="differently">In hindsight, what one thing would you have done differently?</label>
    {!! Form::textarea('differently', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row clearfix">
    <div class="form-group col-xs-12">
    <label for="last_words">Famous last words?</label>
    {!! Form::textarea('last_words', null, [ 'class' => 'form-control' ]) !!}
    </div>
</div>

<div class="row clearfix">
    <div class="form-group col-sm-12">
        <button type="submit" data-id="{{ $guest->id }}"class="btn btn-primary save-button">Submit</button>
    </div>
</div>
</div>
<div class="col-md-2"></div>

{!! Form::close() !!}

@stop