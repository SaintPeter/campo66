@extends('layouts.master')

@section('script')
$('#filter').livefilter({selector:'ul li'}).focus();
@endsection

@section('content')
<div class="col-md-2"></div>
    <div class="col-md-8">
        <h1>Class List</h1>
        <p>Click names with an <i class="fa fa-file-text-o"></i> icon to see questionaires.</p>
        <div class="row">
        <div class="col-sm-12 clearfix">
        <div class="col-sm-6">
            {!! Form::text('filter', null, [ 'id' => 'filter', 'class' => 'form-control', 'placeholder' => 'Bob Jones' ]) !!}
        </div>
        </div>
        </div>

        <ul class="classlist">
        @foreach($guests as $guest)
            <li>
                <a href="{{ route('answers', [ 'id' => $guest->id ]) }}">
                    {{ $guest->full_name }}
                </a>
                @if($guest->answerLength())
                    <i class="fa fa-file-text-o" title="Questionare Answers from 1986/1996"></i>
                @endif
                @if($guest->edited_status)
                    &nbsp;&mdash;&nbsp;<strong><em>{{ $guest->edited_status }}</em></strong>
                @endif
            </li>
        @endforeach
        </ul>
        </div>
    </div>
<div class="col-md-2"></div>
@endsection