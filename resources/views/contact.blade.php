@extends('layouts.master')

@section('content')

{!! Form::open([ 'url' => route('email'), 'method' => 'post']) !!}
<div class="col-md-2"></div>
<div class="col-md-8">
    <h1>Contact Us</h1>
    <p>Use the contact form below or e-mail us at
        <a href="mailto:campolindo66@gmail.com?subject=Reunion">campolindo66@gmail.com</a>
    </p>
    <div class="form-group">
    <label for="email">Your e-mail Address</label>
        {!! Form::text('email', null, [ 'class' => 'form-control' ]) !!}
    </div>
    <div class="form-group">
    <label for="body">Body</label>
        {!! Form::textarea('body', null, [ 'class' => 'form-control' ]); !!}
    </div>
    <p>All of the information you submit will be kept private unless you tell us otherwise.</p>
    <div class="form-group">
        <button type="submit" class="btn btn-primary pull-right">Send</button>
    </div>
 </div>
<div class="col-md-2"></div>
{!! Form::close() !!}
@endsection