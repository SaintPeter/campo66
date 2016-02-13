@extends('layouts.master')

@section('script')
// Handlers
$('.guestrow > td:not(.noclick)').on('click', toggleRow);
$('.set_status').on('click', setStatus);
$(document).on('click', '.phonetype', setPhoneType);

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


@endsection

@section('content')
    <h1>Guests <a href="{{ url('guests/create') }}" class="btn btn-primary pull-right btn-sm">Add New Guest</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Married Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($guests as $item)
                <tr class="guestrow" data-id="{{ $item->id }}">
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->married_name }}</td>
                    <td class="noclick">
                        <div class="btn-group">
                          <button type="button" class="btn dropdown-toggle {{ $item->statusColor() }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <td id="detail{{ $item->id }}" colspan="4">
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $guests->render() !!} </div>
    </div>

@endsection
