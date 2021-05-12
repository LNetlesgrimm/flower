@extends('template')

@section('title', 'Flowers List')

@section('content')

@if($message = Session::get('success'))
    <strong class="success">{{$message}}</strong>
@endif

<ul>
    @foreach($flowers as $flower)
    <li>Name: {{ $flower->name }}</li>
    <li>Price: {{ $flower->priceSymbol }}</li>
    <li>Type: {{ $flower->type }}</li>
    <li>Created at: {{ $flower->created_at }}</li>
    <li><a href="{{ url('/flower', $flower->id) }}">Details</a></li>
    @if ($user = Auth::user())
    <li><a href="{{ url('/update/flowers', $flower->id) }}">Edit</a></li>
    <!--
        <li><a href="{{ url('/delete/flowers', $flower->id) }}" id="delete">Delete</a></li>
    -->
    <button value="{{$flower->id}}" class="delete">Delete</button>
    @endif
    <hr>
    @endforeach
</ul>
@endsection

@section('script')
<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous">
</script>

<script>
    $(function () {
        $('.delete').click(function () {
            let route = '/delete/flowers/' + $(this).val();
            $.ajax({
                url: route,
                method: 'delete',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            .done(function (result) {
                // console.log("SUCCESS: " + result);
                $('body').html(result);
            })
            .fail(function (result) {
                console.log("AJAX failed");
            });
        });
    });
</script>
@endsection