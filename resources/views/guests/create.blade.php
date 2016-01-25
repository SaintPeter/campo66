@extends('layouts.master')

@section('content')

    <h1>Create New Guest</h1>
    <hr/>

    {!! Form::open(['url' => 'guests', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
                {!! Form::label('first_name', 'First Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
                {!! Form::label('last_name', 'Last Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('married_name') ? 'has-error' : ''}}">
                {!! Form::label('married_name', 'Married Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('married_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('married_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('spouse_name') ? 'has-error' : ''}}">
                {!! Form::label('spouse_name', 'Spouse Name: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('spouse_name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('spouse_name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address1') ? 'has-error' : ''}}">
                {!! Form::label('address1', 'Address1: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address1', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('address1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
                {!! Form::label('address2', 'Address2: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('address2', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('address2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', 'City: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
                {!! Form::label('state', 'State: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('state', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('zip') ? 'has-error' : ''}}">
                {!! Form::label('zip', 'Zip: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('zip', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
                {!! Form::label('notes', 'Notes: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('found96') ? 'has-error' : ''}}">
                {!! Form::label('found96', 'Found96: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('found96', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('found96', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('found96', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('found16') ? 'has-error' : ''}}">
                {!! Form::label('found16', 'Found16: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('found16', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('found16', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('found16', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone1') ? 'has-error' : ''}}">
                {!! Form::label('phone1', 'Phone1: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone1', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('phone1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone1type') ? 'has-error' : ''}}">
                {!! Form::label('phone1type', 'Phone1type: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone1type', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('phone1type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone2') ? 'has-error' : ''}}">
                {!! Form::label('phone2', 'Phone2: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone2', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('phone2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone2type') ? 'has-error' : ''}}">
                {!! Form::label('phone2type', 'Phone2type: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone2type', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('phone2type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone3type') ? 'has-error' : ''}}">
                {!! Form::label('phone3type', 'Phone3type: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone3type', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('phone3type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone3') ? 'has-error' : ''}}">
                {!! Form::label('phone3', 'Phone3: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone3', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('phone3', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email2') ? 'has-error' : ''}}">
                {!! Form::label('email2', 'Email2: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email2', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email2', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('married') ? 'has-error' : ''}}">
                {!! Form::label('married', 'Married: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('married', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('married', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('married', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('married_times') ? 'has-error' : ''}}">
                {!! Form::label('married_times', 'Married Times: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('married_times', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('married_times', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('children') ? 'has-error' : ''}}">
                {!! Form::label('children', 'Children: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('children', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('children', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('children_names') ? 'has-error' : ''}}">
                {!! Form::label('children_names', 'Children Names: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('children_names', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('children_names', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('education') ? 'has-error' : ''}}">
                {!! Form::label('education', 'Education: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('education', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('education', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('employment') ? 'has-error' : ''}}">
                {!! Form::label('employment', 'Employment: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('employment', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('employment', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('hobbies') ? 'has-error' : ''}}">
                {!! Form::label('hobbies', 'Hobbies: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('hobbies', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('hobbies', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('unexpected_event') ? 'has-error' : ''}}">
                {!! Form::label('unexpected_event', 'Unexpected Event: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('unexpected_event', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('unexpected_event', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('greatest_accomplishment') ? 'has-error' : ''}}">
                {!! Form::label('greatest_accomplishment', 'Greatest Accomplishment: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('greatest_accomplishment', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('greatest_accomplishment', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('travel') ? 'has-error' : ''}}">
                {!! Form::label('travel', 'Travel: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('travel', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('travel', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('notdone') ? 'has-error' : ''}}">
                {!! Form::label('notdone', 'Notdone: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('notdone', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('notdone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('miles') ? 'has-error' : ''}}">
                {!! Form::label('miles', 'Miles: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('miles', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('miles', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dlnum') ? 'has-error' : ''}}">
                {!! Form::label('dlnum', 'Dlnum: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('dlnum', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('dlnum', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('quest') ? 'has-error' : ''}}">
                {!! Form::label('quest', 'Quest: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('quest', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('quest', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection