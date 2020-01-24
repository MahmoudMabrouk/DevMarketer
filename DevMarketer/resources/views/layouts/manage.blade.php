<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DevMarketer -  MANAGEMENT</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
        
        
        @include('_includes.nav.main')
        @include('_includes.nav.manage')
    <div id="app" class="management-area">

        <main class="py-4">
            <div class="container ">
                @yield('content')
            </div>
        </main>
    </div>
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
