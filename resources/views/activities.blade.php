@extends('layouts.master')

@section('content')
<div class="col-md-2"></div>
<div class="col-md-8">
    <h1>Activities</h1>
    <div class="panel panel-default">
        <div class="panel-heading"><h2 class="panel-title">Friday, October 14, 2016</h2></div>
        <div class="panel-body">
            <strong>Afternoon</strong> &mdash; Tour of Campolindo<br>
            <strong>Evening </strong> &mdash; Away football game or a casual gathering at the Embassy Suites Lounge 7:00pm
         </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h2 class="panel-title">Saturday, October 15, 2016</h2></div>
        <div class="panel-body">
            <strong>Morning</strong> &mdash; Fun gathering and games at the Moraga Commons park<br>
            <strong>Evening</strong> &mdash; Texas Back 40 in Pleasant Hill<br>
            5:00-9:00 in the upper room<br>
            Casual event with buffet dinner and no host bar<br><br>

            Cost will be minimal (Thanks to generous donors.
            If you would like to donate, please <a href="{{ route('contact') }}">Contact Us</a>)<br>

            <h4>Hotel Suggestions</h4>Embassy Suites (Walnut Creek at the Pleasant Hill BART)<br>
            Ext. Stay America (Pleasant Hill)<br>
            Holiday Inn (Walnut Creek)
         </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h2 class="panel-title">Reunion Committee</h2></div>
        <div class="panel-body">
            <img src="/images/committee.jpg" class="img-responsive"><br>
            Don Schrader, Sandy Ivy Landin, Valerie Smith Brousseau, Bill Smedley, Gwen Reid Lundmark, Bruce Van Voorhis and Judi Steen Carmona<br>
            <p class="text-center">e are having so much fun and can&apos;t wait to see you all!</p>
         </div>
    </div>

</div>
<div class="col-md-2"></div>
@endsection