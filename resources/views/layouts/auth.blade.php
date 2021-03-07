<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/insulink/css/application.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/insulink/css/tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/insulink/css/theme.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="bg-gray-50 h-screen">

        <main class="h-full overflow-y-auto my-4">
            <div class="container">
                @if ($quotations ?? '')
                    <div class="row">
                        <div class="col-sm-12">
                            @include('layouts.stats')
                        </div>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-sm-12">
                        @include('flash-message')
                        @yield('content')
                    </div>
                </div>
            </div>
            
        </main>
    </div>
</body>
</html>
