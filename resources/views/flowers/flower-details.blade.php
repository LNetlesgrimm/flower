@extends('template')

@section('title', 'Flower details')

@section('content')

@if($message = Session::get('success'))
    <strong class="success">{{$message}}</strong>
@endif
<h2>Flower details</h2>
<ul>
    <li>Name: {{ $flower->name}}</li>
    <li>Price: {{ $flower->priceSymbol}}</li>
    <li>Type: {{ $flower->type}}</li>
    <img src="/uploads/{{$flower->poster}}" alt="">
    <hr>
    <h3>Comments</h3>
    @foreach ($flower->comments as $comment)
        <li>Subject: {{ $comment->subject}}</li>
        <li>Message: {{ $comment->message}}</li>
        <hr>
    @endforeach
</ul>

<h3>Add a comment</h3>
<form action="" method="post">
    @csrf
    <input type="text" name="subject" placeholder="Subject">
    @error('subject')
        <div style="color:red" class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea name="message" cols="30" rows="10" placeholder="Your comment"></textarea>
    @error('message')
        <div style="color:red" class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="submit" value="Send">
</form>

@endsection