@extends('template')

@section('title', 'Update flower')

@section('content')

<h2>Update flower</h2>
<form action="" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="Name" value="{{$flower->name}}"><br>
    @error('name')
        <div style="color:red" class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="number" name="price" placeholder="Price" value="{{$flower->price}}"><br>
    @error('price')
        <div style="color:red" class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select name="type">
        <option value="Magnoliophyta" @if($flower->type == 'Magnoliophyta') selected @endif>Magnoliophyta</option>
        <option value="Asteraceae" @if($flower->type == 'Asteraceae') selected @endif>Asteraceae</option>
    </select>
    <input type="submit" value="Update">
</form>

@endsection