@extends('layouts.master')

@section('content')

    <h1>Guests <a href="{{ url('guests/create') }}" class="btn btn-primary pull-right btn-sm">Add New Guest</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Married Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($guests as $item)
                <tr>
                    <td>{{ $item->first_name }}</td>
                    <td>{{ $item->last_name }}</td>
                    <td>{{ $item->married_name }}</td>
                    <td>
                        <a href="{{ url('guests/' . $item->id . '/show') }}">
                            <button type="submit" class="btn btn-info btn-xs">Show</button>
                        </a> /
                        <a href="{{ url('guests/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['guests', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $guests->render() !!} </div>
    </div>

@endsection
