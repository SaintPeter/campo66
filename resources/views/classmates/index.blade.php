@extends('layouts.master')

@section('script')
// Handlers
$('.guestrow > td:not(.noclick)').on('click', toggleRow);
$('.set_status').on('click', setStatus);
$(document).on('click', '.phonetype', setPhoneType);
$(document).on('click', '.found16', toggle16);
$(document).on('click', '.save-button', saveData);
$('#filter').livefilter({selector:'table tr.guestrow'}).focus();

function toggleRow(e) {
    e.preventDefault();
    var id = $(this).parent().data('id');
    var detailId = "#detail" + id;
    var parentRow = $(detailId).parent();

    if(parentRow.hasClass('hiderow')) {
        // Unhide
        $(detailId).load('/classmates/detail/' + id);
        parentRow.removeClass('hiderow');
        //$(this).text('Hide Detail');
    } else {
        // Hide
        parentRow.addClass('hiderow');
        //$(this).text('Show Detail');
    }
}

function setStatus(e) {
    e.preventDefault();

    var colors = {
        "Unknown": "btn-default",
        "Attending": "btn-success",
        "Not Attending": "btn-warning",
        "Deceased": "btn-info"
    };

    var id = $(this).data('id');
    var status = $(this).text();
    var button = $(this).parent().parent().prev();
    var oldStatus = button.text().trim();

    $.get('{{ route('classmates.setstatus') }}/' + id + '/' + status, function(data) {
        button.html(status + ' <span class="caret"></span>');
        console.log("Old Status:", "'" + oldStatus + "'", "color:", colors[oldStatus]);
        button.removeClass(colors[oldStatus]).addClass(colors[status]);
    }).fail(function() {
        // Handle Failure
        alert('Failure Occured');
    });
}

function setPhoneType(e) {
    e.preventDefault();
    $(this).parent().parent().parent().prev().val( $(this).text() );
}

function toggle16(e) {
    var item = $(this);
    var id = item.closest('.guestrow').data('id');
    $.get('{{ route('classmates.toggle16') }}/' + id, function(data) {
        if(data === "true") {
            item.removeClass('glyphicon-remove').addClass('glyphicon-ok');
            item.parent().removeClass('notfound').addClass('found');
        } else {
            item.removeClass('glyphicon-ok').addClass('glyphicon-remove');
            item.parent().removeClass('found').addClass('notfound');
        }
    });
}

function saveData(e) {
    e.preventDefault();

    var id = $(this).data('id');
    var form = $('#form' + id);
    var data = form.serialize();

    $.post(form.attr('action'), data, function(newDetail) {
        var detail = $("#detail" + id);
        detail.html(newDetail);
        var row = $('.guestrow[data-id='+ id + ']');

        row.find('.first_name').text(detail.find("[name=first_name]").val());
        row.find('.last_name').text(detail.find("[name=last_name]").val());
        row.find('.married_name').text(detail.find("[name=married_name]").val());

    });
}

@endsection

@section('content')
    <h1>Classmates</h1>
    <div class="row">
        <div class="col-sm-12 clearfix ">
            <a href="{{ route('classmates.create') }}" class="btn btn-primary pull-right btn-sm add-guest">Add Classmate</a>
            <a href="{{ route('classmates.emails') }}" class="btn btn-info pull-right btn-sm email-list">E-mail List</a>
            <a href="{{ route('classmates.status') }}" class="btn btn-success pull-right btn-sm status-list">Status Lists</a>
            <div class="col-md-3 col-sm-4 col-xs-6 filter-holder">
                {!! Form::text('filter', null, [ 'id' => 'filter', 'class' => 'form-control', 'placeholder' => 'Bob Jones' ]) !!}
            </div>
        </div>
    </div>

    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Married Name</th>
                    <th class="text-center">Notes</th>
                    <th class="text-center">Found '96</th>
                    <th class="text-center">Found '16</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($guests as $item)
                <tr class="guestrow" data-id="{{ $item->id }}">
                    <td class="first_name">{{ $item->first_name }}</td>
                    <td class="last_name">{{ $item->last_name }}</td>
                    <td class="married_name">{{ $item->married_name }}</td>
                    <td class="notes-col">
                        @if(!empty(trim($item->notes)))
                            <i class="fa fa-file-text-o fa-lg"></i>
                        @endif
                    </td>
                    <td class="found-col noclick">
                        @if($item->found96)
                            <span class="found">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </span>
                        @else
                            <span class="notfound">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </span>
                        @endif
                    </td>
                    <td class="found-col noclick">
                        @if($item->found16)
                            <span class="found">
                                <span class="glyphicon glyphicon-ok found16" title="Click To Toggle" aria-hidden="true"></span>
                            </span>
                        @else
                            <span class="notfound">
                                <span class="glyphicon glyphicon-remove found16" title="Click To Toggle" aria-hidden="true"></span>
                            </span>
                        @endif
                    </td>
                    <td class="status-col noclick">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm dropdown-toggle {{ $item->statusColor() }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $item->status }} <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="set_status" data-id="{{ $item->id }}" href="#">Unknown</a></li>
                            <li><a class="set_status bg-success" data-id="{{ $item->id }}" href="#">Attending</a></li>
                            <li><a class="set_status bg-warning" data-id="{{ $item->id }}" href="#">Not Attending</a></li>
                            <li><a class="set_status bg-info" data-id="{{ $item->id }}" href="#">Deceased</a></li>
                          </ul>
                        </div>
                    </td>
                </tr>
                <tr class="hiderow detailrow">
                    <td id="detail{{ $item->id }}" colspan="7">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
