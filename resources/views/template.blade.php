<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ url('flowers') }}">Flowers</a></li>
            <li><a href="{{ url('create/flowers') }}">Add a flower</a></li>
        </ul>
    </nav>
    <div class="content">
        @yield('content')
    </div>
    @yield('script')
</body>
</html>