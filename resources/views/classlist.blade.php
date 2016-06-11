@extends('layouts.master')

@section('script')
$('#filter').livefilter({selector:'table tr'}).focus();
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
        <th class="text-center">Questionnaires</th>
        <th class="text-center">Status</th>

        </tr>
        @foreach($guests as $guest)
            <tr>
                <td>
                    {{ $guest->full_name }}
                </td>
                <td class="text-center">
                    @if($guest->answerLength())
                        <a href="{{ route('answers', [ 'id' => $guest->id ]) }}#view1986" title="Questionnaire Answers from 1986">
                            1986
                            <i class="fa fa-file-text-o"></i>
                        </a>
                    @else
                        &nbsp;
                    @endif
                    @if(isset($guest->answer))
                        &nbsp;
                        <a href="{{ route('answers', [ 'id' => $guest->id ]) }}#view2016" title="Questionnaire Answers from 2016">
                            2016
                            <i class="fa fa-file-text-o"></i>
                        </a>
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