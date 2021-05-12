@extends('template')

@section('title', 'Add a new flower')

@section('content')

<h2>Insert a new flower</h2>
<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Name"><br>
    @error('name')
        <div style="color:red" class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="number" name="price" placeholder="Price"><br>
    @error('price')
        <div style="color:red" class="alert alert-danger">{{ $message }}</div>
    @enderror
    <select name="type">
        <option value="Magnoliophyta">Magnoliophyta</option>
        <option value="Asteraceae">Asteraceae</option>
    </select><br>
    <input type="file" name="poster"><br>
   <!--  @error('type')
        <div style="color:red">{{ $message}}</div>
    @enderror -->
    <input type="submit" value="INSERT">

</form>

@endsection