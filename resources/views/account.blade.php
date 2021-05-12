@extends('template')

@section('title', 'User profile')

@section('content')

<!-- @if($message = Session::get('success'))
    <strong class="success">{{$message}}</strong>
@endif -->
@if ($user = Auth::user())
<ul>
    <li>Firstname: {{ $user->firstname }}</li>
    <li>Lastname: {{ $user->lastname }}</li>
    <hr>
</ul>

@endif
@endsection