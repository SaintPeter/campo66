@extends('layouts.master')

@section('script')
// Handlers
$('.guestrow > td:not(.noclick)').on('click', toggleRow);
$('.set_status').on('click', setStatus);
$(document).on('click', '.phonetype', setPhoneType);
$(document).on('click', '.found16', toggle16);
$(document).on('click', '.save-button', saveData);

function toggleRow(e) {
    e.preventDefault();
    var id = $(this).parent().data('id');
    var detailId = "#detail" + id;
    var parentRow = $(detailId).parent();

    if(parentRow.hasClass('hiderow')) {
        // Unhide
        $(detailId).load('/guests/detail/' + id);
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

    $.get('{{ route('guests.setstatus') }}/' + id + '/' + status, function(data) {
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
    $.get('{{ route('guests.toggle16') }}/' + id, function(data) {
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
        $("#detail" + id).html(newDetail);
    });
}


$('#filter').livefilter({selector:'table tr.guestrow'}).focus();

@endsection

@section('content')
    <h1>Guests</h1>
    <div class="row">
        <div class="col-sm-12 clearfix">
        <div class="col-ms-4 col-xs-6">
            {!! Form::text('filter', null, [ 'id' => 'filter', 'class' => 'form-control', 'placeholder' => 'Bob Jones' ]) !!}
        </div>
        </div>
        </div>
    <a href="{{ url('guests/create') }}" class="btn btn-primary pull-right btn-sm add-guest">Add New Guest</a>
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
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->married_name }}</td>
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
