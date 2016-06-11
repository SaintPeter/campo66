@extends('layouts.master')

@section('script')
$(document).ready(function() {
    if (location.hash) {
        $("a[href='" + location.hash + "']").tab("show");
        setTimeout(function() {
            $(window).scrollTop(0);
            console.log('bing');
        }, 200);
    }

    $("a[data-toggle='pill']").on("shown.bs.tab", function (e) {
        var hash = $(e.target).attr("href");
        history.replaceState(hash);
    });
});
@stop

@section('content')
<div class="col-md-2 sm-hidden"></div>
<div class="col-md-8 col-sm-12 answers">
    <h1>Questionnaire Answers</h1>
    <div class="guestName">
        <h2>
        {{ $guest->first_name }}
            @if(!empty($guest->married_name))
                ({{ $guest->married_name }})
            @endif
            {{ $guest->last_name }}
        </h2>
        <ul class="nav nav-tabs navbar-right" role="tablist">
            @if(isset($guest->answer))
                <li role="presentation" class="">
                    <a href="#view2016" aria-controls="view2016" role="tab" data-toggle="pill">2016</a>
                </li>
            @endif
            <li role="presentation" class="active">
                <a href="#view1986" aria-controls="view1986" role="tab" data-toggle="pill">1986</a>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="view1986">
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
        @if(isset($guest->answer))
        <div role="tabpanel" class="tab-pane" id="view2016">
            <label>Estimated number of times you have moved?</label>
            <p>{{ $guest->answer->moved }}&nbsp;</p>

            <label>Furthest residence you have lived since graduating?</label>
            <p>{{ $guest->answer->furthest }}&nbsp;</p>

            <label>Years of schooling past high school?</label>
            <p>{{ $guest->answer->schooling }}&nbsp;</p>

            <label>Have you had a book published?</label>
            <p>{{ $guest->answer->book }}&nbsp;</p>

            <label>What was your coolest job?</label>
            <p>{{ $guest->answer->coolestjob }}&nbsp;</p>

            <label>What has been your predominate occupation - how would you describe it?</label>
            <p>{!! nl2br($guest->answer->occupation) !!}&nbsp;</p>

            <div class="row">
                <div class="col-xs-6">
                    <label>Are you retired?</label>
                    <p>{{ $guest->answer->retired ? 'Yes' : 'No' }}&nbsp;</p>
                </div>
                <div class="col-xs-6">
                    <label>Retirement Date</label>
                    <p>{{ $guest->answer->retired_date }}&nbsp;</p>
                </div>
            </div>

            <label>Number of children and their ages:</label>
            <p>{!! nl2br( $guest->answer->children ) !!}&nbsp;</p>

            <label>Number of grandchildren and their ages:</label>
            <p>{!! nl2br( $guest->answer->grandchildren ) !!}&nbsp;</p>

            <label>Number of great grantchildren and their ages:</label>
            <p>{!! nl2br( $guest->answer->greatgrandchildren ) !!}&nbsp;</p>

            <label>What countries have you visited?</label>
            <p>{!! nl2br( $guest->answer->countries ) !!}&nbsp;</p>

            <label>What is the furthest country you have visited?</label>
            <p>{{ $guest->answer->furthest_country }}&nbsp;</p>

            <label>What are the highlights of your life?</label>
            <p>{!! nl2br( $guest->answer->highlights ) !!}&nbsp;</p>

            <label>What achievement or personal record are you proud of?</label>
            <p>{!! nl2br( $guest->answer->achievement ) !!}&nbsp;</p>

            <label>In hindsight, what one thing would you have done differently?</label>
            <p>{!! nl2br( $guest->answer->differently ) !!}&nbsp;</p>

            <label>Famous last words?</label>
            <p>{!! nl2br( $guest->answer->last_words ) !!}&nbsp;</p>


        </div>
        @endif
    </div>



 </div>
<div class="col-md-2 sm-hidden"></div>
@endsection