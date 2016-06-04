@extends('layouts.master')

@section('script')

@stop

@section('content')
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h1>Questionnaire 2016</h1>

        <h2>Enter your Code</h2>
        <div class="indent">
            You should have recieved an e-mail with a special link and code to fill
            our your personal questionnaire. You can click that link directly or enter
            your code below.
            <br><br>
            {!! Form::open(['route' => 'questionnaire.answer', 'method' => 'get', 'class' => 'form' ]) !!}
                <label for="qcode" class="form-label">Enter your Questionnaire Code here:</label><br>
                {!! Form::text('qcode', null, [ 'class' => 'form-input' ]) !!}
                {!! Form::submit('Answer Questionnaire', [ 'class' => 'btn btn-sm btn-primary btn-margin' ]) !!}
            {!! Form::close() !!}
        </div>

        <h2>Don't have a code?</h2>
        <div class="indent">
          If we have a valid e-mail on file for you, you can enter your address below
          and we'll send you the code again. If we don't have an e-mail address, you can use our
          {!! link_to_route('contact', 'Contact Form') !!} to send it to us.
          <br><br>
          {!! Form::open(['route' => 'questionnaire.resend', 'method' => 'get', 'class' => 'form' ]) !!}
            <label for="email" class="form-label">Enter your e-mail address:</label><br>
            {!! Form::text('email', null, [ 'class' => 'form-input' ]) !!}
            {!! Form::submit('Send Code', [ 'class' => 'btn btn-sm btn-primary btn-margin' ]) !!}
          {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-2"></div>
@stop
