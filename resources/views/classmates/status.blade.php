@extends(($print == "print") ? 'layouts.print' : 'layouts.master')

@section('script')
var titles = {
    "attending": "Attending Classmates",
    "deceased": "Deceased Classmates",
    "found": "Found Classmates",
    "notfound": "Not Found Classmates"
};

// Handlers
$('.filter-button').on('click', handleFilter);
$(window).on('popstate', handleNavState);
$(document).on('ready', handleReady);

$('#clear-filter').on('click', function(e) {
    window.location = window.location.pathname;
});

$('#print-button').on('click', handlePrint);

var lastButton;

function handleReady(e) {
    if(window.location.hash) {
        var type = window.location.hash.slice(1);
        lastButton = $('[data-type=' + type + ']');
        doFilter(type);
    } else {
        doFilter();
    }
    if(printMode) {
        if(type) {
            $('#title').html(titles[type]);
        } else {
            $('#title').html("All Classmates");
        }
        setTimeout(function () { window.print(); }, 500);
        window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
    }


}

// Navigate
function handlePrint(e) {
    var newUrl = window.location.pathname + '/print' + window.location.hash;
    window.open(newUrl);
}

// Handle navigating back/forward
function handleNavState(event) {
    $('button').removeClass('active').prop('aria-pressed', false);
    if(event.originalEvent.state) {
        doFilter(event.originalEvent.state.type);
    } else {
        doFilter();
    }
}

function handleFilter(e) {
    var type = $(this).data('type');

    // Store current view on history
    history.pushState({ type: type }, '', '#' + type);

    if(lastButton) {
        $(lastButton).removeClass('active').prop('aria-pressed', false);
    }

    lastButton = this;

    doFilter(type);
}

function doFilter(type) {
    $('[data-type=' + type + ']').addClass('active').prop('aria-pressed', true);

    var filter = function() { return true; };

    switch(type) {
        case 'attending':
            filter = function(item) { return item.status === 'Attending' };
            break;
        case 'deceased':
            filter = function(item) { return item.status === 'Deceased' };
            break;
        case 'found':
            filter = function(item) { return item.found16 == 1 };
            break;
        case 'notfound':
            filter = function(item) { return item.found16 == 0 };
    }

    var filtered = guests.filter(filter);

    // Add padding to list
    while(filtered.length % 3) {
        filtered.push({"first_name":"","last_name":"","married_name":""});
    }

    // Display everything
    var output = '<table class="table table-striped"><tbody>';
    var offset = filtered.length / 3;
    var offset2 = offset * 2;
    for(var i = 0; i < filtered.length / 3; i++) {
        output += '<tr>';
        output += '<td>' + fullname(filtered[i]) +'</td>';
        output += '<td>' + fullname(filtered[i + offset]) +'</td>';
        output += '<td>' + fullname(filtered[i + offset2]) +'</td>';
        output += '</tr>';
    }
    output += '</tbody></table>';

    $("#output_area").html(output);
}

function fullname(obj) {
    if(obj.married_name) {
        return obj.first_name + ' (' + obj.married_name + ') ' + obj.last_name;
    } else {
        return obj.first_name + ' ' + obj.last_name;
    }
}
var printMode = "{{ $print }}";
var guests = {!! $guests->toJson() !!};

@endsection

@section('content')
    @if($print != "print")
        <h1>Status List</h1>
        <div class="row">
            <div class="btn-group" data-toggle="buttons-radio">
                <button type="button" data-type="attending" class="btn btn-primary filter-button">Attending</button>
                <button type="button" data-type="deceased" class="btn btn-primary filter-button">Deceased</button>
                <button type="button" data-type="found" class="btn btn-primary filter-button">Found</button>
                <button type="button" data-type="notfound" class="btn btn-primary filter-button">Not Found</button>
            </div>
            <button id="clear-filter" class="btn btn-warning">Clear</button>
            <button id="print-button" class="pull-right btn btn-info">Print</button>
        </div>
    @else
        <h1 id="title"></h1>
        <p class="lead pull-right">{{ date('M d, Y') }}</p>
    @endif
    <div class="col-xs-12">&nbsp;</div>
    <div class="row" id="output_area">

    </div>
@endsection