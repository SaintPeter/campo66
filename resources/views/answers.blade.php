@extends('layouts.master')

@section('content')
<div class="col-md-2 sm-hidden"></div>
<div class="col-md-8 col-sm-12 answers">
    <h1>Previous Questionaire</h1>
    <div class="guestName"><h2>
        {{ $guest->first_name }}
            @if(!empty($guest->married_name))
                ({{ $guest->married_name }})
            @endif
            {{ $guest->last_name }}
    </h2>

   <em>Circa 1986/1996</em></div>
    <hr>
    <div class="row">
        <div class="col-xs-2">
            <label>Children</label>
            <p class="text-center">{{ $guest->children }}</p>
        </div>
        <div class="col-xs-10">
            <label>Children's Names</label>
            <p>{{ $guest->children_names }}&nbsp;</p>
        </div>
    </div>

    <label>Education</label>
    <p>{{ $guest->education }}&nbsp;</p>

    <label>Employment</label>
    <p>{{ $guest->employment}}&nbsp;</p>

    <label>Hobbies</label>
    <p>{{ $guest->hobbies }}&nbsp;</p>

    <label>Unexpected Event</label>
    <p>{{ $guest->unexpected_event }}&nbsp;</p>

    <label>Greatest Accomplishment</label>
    <p>{{ $guest->greatest_accomplishment }}&nbsp;</p>

    <label>Travel</label>
    <p>{{ $guest->travel }}&nbsp;</p>

    <label>Not Done Yet</label>
    <p>{{ $guest->notdone }}&nbsp;</p>



 </div>
<div class="col-md-2 sm-hidden"></div>
@endsection