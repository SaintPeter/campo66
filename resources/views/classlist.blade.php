@extends('layouts.master')

@section('script')
$('#filter').livefilter({selector:'table td'}).focus();
@endsection

@section('content')
<div class="col-md-2"></div>
    <div class="col-md-8">
        <h1>Class List</h1>
        <p>Click names with an <i class="fa fa-file-text-o"></i> icon to see questionaires.</p>
        <p>Classmates with a <span class="not_found">Not Found</span> label have not been found by the committee.  If you have information about them, please send us an e-mail via the "Contact Us" page.</p>
        <div class="row">
        <div class="col-sm-12 clearfix">
        <div class="col-sm-6 filter-holder">
            <label for="filter">Filter</label>
            {!! Form::text('filter', null, [ 'id' => 'filter', 'class' => 'form-control', 'placeholder' => 'Bob Jones' ]) !!}
        </div>
        </div>
        </div>

        <table class="classlist table table-striped">
        <tr>
        <th>Name</th>
        <th class="text-center">Questionare</th>
        <th class="text-center">Status</th>

        </tr>
        @foreach($guests as $guest)
            <tr>
                <td>
                    <a href="{{ route('answers', [ 'id' => $guest->id ]) }}">
                        {{ $guest->full_name }}
                    </a>
                </td>
                <td class="text-center">
                    @if($guest->answerLength())
                        <i class="fa fa-file-text-o" title="Questionare Answers from 1986/1996"></i>
                    @else
                        &nbsp;
                    @endif
                </td>
                <td class="text-center">
                    @if($guest->edited_status)
                        <strong><em>{{ $guest->edited_status }}</em></strong>
                    @else
                        @if(!$guest->found16)
                            <span class="not_found">Not Found</span>
                        @endif
                    @endif
                </td>
            </tr>
        @endforeach
        </table>
        </div>
    </div>
<div class="col-md-2"></div>
@endsection