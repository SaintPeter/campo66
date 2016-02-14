@extends('layouts.master')

@section('content')
<div class="col-md-2 sm-hidden"></div>
<div class="col-md-8 col-sm-12">
    <h1>Previous Questionaire Answers</h1>
    <p>c1986/1996</p>
    <h2>
        {{ $guest->first_name }}
            @if(!empty($guest->married_name))
                ({{ $guest->married_name }})
            @endif
            {{ $guest->last_name }}
    </h2>

    <div class="row">
        <div class="col-md-2">
            <label>Children</label>
            <p>{{ $guest->children }}</p>
        </div>
        <div class="col-md-10">
            <label>Children's Names</label>
            <p>{{ $guest->children_names }}</p>
        </div>
    </div>

    <label>Education</label>
    <p>{{ $guest->education }}</p>

    <label>Employment</label>
    <p>{{ $guest->employment}}</p>

    <label>Hobbies</label>
    <p>{{ $guest->hobbies }}</p>

    <label>Unexpected Event</label>
    <p>{{ $guest->unexpected_event }}</p>

    <label>Greatest Accomplishment</label>
    <p>{{ $guest->greatest_accomplishment }}</p>

    <label>Travel</label>
    <p>{{ $guest->travel }}</p>

    <label>Not Done Yet</label>
    <p>{{ $guest->notdone }}</p>



 </div>
<div class="col-md-2 sm-hidden"></div>
@endsection