@extends('layouts.master')

@section('script_footer', '<script src="https://cdn.jsdelivr.net/clipboard.js/1.5.8/clipboard.min.js"></script>')

@section('script')
new Clipboard('.btn-copy', {
    text: function(trigger) {
        return $(trigger).parent().next().text().trim();
    }
});

new Clipboard('.btn-copy-all', {
    text: function(trigger) {
        return $('.panel-body').toArray().reduce(function(acc, item) {
            return acc + item.textContent.trim();
        }, "");
    }
});

@endsection

@section('content')
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h1>Classmate E-mails</h1>
        <div class="row button-row">
            <div class="col-xs-12 clearfix">
                <button class="btn-copy-all btn btn-success pull-right"><i class="fa fa-copy"></i> Copy All</button>
                <p>Address dates are updated whenever this page is visited.<br><em>Note: Copy buttons do not work on Safari/iOS.</em></p>
            </div>
        </div>
        @if(isset($mail_list))
            @foreach($mail_list as $date => $emails)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>{{ count($emails) }} Addresses</strong> - As of {{ $date }}
                    <button class="btn-copy btn btn-primary btn-xs pull-right"><i class="fa fa-copy"></i> Copy</button>
                </div>
                <div class="panel-body">
                    @foreach($emails as $email){{ $email }}@endforeach
                </div>
            </div>
            @endforeach
        @else
            <h2>No e-mail addresses have been set.</h2>
        @endif
    </div>
    <div class="col-md-2"></div>
@endsection