@extends('layouts.master')

@section('content')
<h1>Class List</h1>
<ul>
@foreach($guests as $guest)
    <li>
        <a href="{{ route('answers', [ 'id' => $guest->id ]) }}">
            {{ $guest->first_name }}
            @if(!empty($guest->married_name))
                ({{ $guest->married_name }})
            @endif
            {{ $guest->last_name }}
            </li>
        </a>
    </li>
@endforeach
</ul>

@endsection