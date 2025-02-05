<!DOCTYPE html>
<html lang="ar">
<head>
    
    @include('layout.head')
    @include('layout.style')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @include('layout.header') 
 

    <div class="content">
        @yield('content')  
    </div>

    @include('layout.footer') 
    @include('layout.script') 
</body>
</html>
