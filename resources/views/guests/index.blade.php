@extends('layouts.master')

@section('script')
$('.showdetail').on('click', toggleRow);

function toggleRow(e) {
    e.preventDefault();
    var id = $(this).data('id');
    var detailId = "#detail" + id;
    var parentRow = $(detailId).parent();

    if(parentRow.hasClass('hiderow')) {
        // Unhide
        $(detailId).load('/guests/detail/' + id);
        parentRow.removeClass('hiderow');
        $(this).text('Hide Detail');
    } else {
        // Hide
        parentRow.addClass('hiderow');
        $(this).text('Show Detail');
    }
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
                    <th>
                        <div class="action-col">Actions</div>
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($guests as $item)
                <tr class="guestrow" id=>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->married_name }}</td>
                    <td>
                        <div class="action-col">
                            <button class="btn btn-primary btn-xs showdetail" data-id="{{ $item->id }}"</button>
                                Show Detail
                            </button>
                            <a href="{{ url('guests/' . $item->id ) }}">
                                <button type="submit" class="btn btn-info btn-xs">Full Detail</button>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="hiderow detailrow">
                    <td id="detail{{ $item->id }}" colspan="3">
                    </td>
                    <td class="button-holder">
                        <button class="btn btn-warning btn-xs save-button">Save</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $guests->render() !!} </div>
    </div>

@endsection
