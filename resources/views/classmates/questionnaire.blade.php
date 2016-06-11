@extends('layouts.master')

@section('script')

@stop

@section('content')
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h1>Questionnaire Management</h1>
        <a class="btn btn-success pull-right" href="{{ route('classmates.questionnaire.send') }}">Send {{ count($guests_unsent) }} Questionnaires</a>
        <h2>Unsent Questionnaires</h2>

        <div class="panel panel-default">
            <div class="panel-body">
               @if(isset($guests_unsent))
                    {{ join("; ", $guests_unsent->lists('full_name')->toArray()) }}
               @else
                   No Unsent Questionnaires
               @endif

            </div>
        </div>

        <h2>Sent Questionnaires</h2>
        <table class="table table-compact table-striped">
            <tr>
                <th>Name</th>
                <th>Sent</th>
                <th>Action</th>
            </tr>
             @if(isset($guests_sent))
                @foreach($guests_sent as $guest)
                    <tr>
                        <td>{{ $guest->full_name }}</td>
                        <td>{{ $guest->qsent->toFormattedDateString() }}</td>
                        <td><a class="btn btn-info btn-sm" href="{{ route('classmates.questionnaire.resend', [ $guest->id ] ) }}">Resend</a></td>
                    </tr>
                @endforeach
           @else
                <tr>
                    <td class="text-center">No Sent Questionnaires</td>
                </tr>
           @endif
        </table>
    </div>
    <div class="col-md-2"></div>
@stop