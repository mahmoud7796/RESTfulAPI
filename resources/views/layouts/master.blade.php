<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>

@include('layouts.parts.header')
@yield('content')
@include('layouts.parts.footer')

</body>
</html>
