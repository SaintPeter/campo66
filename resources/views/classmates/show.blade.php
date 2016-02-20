@extends('layouts.master')

@section('content')

    <h1>Guest</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>First Name</th><th>Last Name</th><th>Married Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $guest->id }}</td> <td> {{ $guest->first_name }} </td><td> {{ $guest->last_name }} </td><td> {{ $guest->married_name }} </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection