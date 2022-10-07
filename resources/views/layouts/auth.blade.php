<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HIMTI Election 2022') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/himti-icon.svg') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <main class="py-5">
        <div id="main-container" class="mt-5 mx-3">
            <div id="sec-container">
                <div id="left-container">
                    <div id="main-title" class="text-shadow">
                        HIMTI ELECTION 2022
                    </div>
        
                    <div id="date">
                        7-21st October 2022
                    </div>
                </div>
                <div id="right-container">
                    <div id="motto">
                        ONE FAMILY ONE GOAL!
                    </div>
        
                    <div id="input-container">
                        @yield('content')
                    </div>
                </div>
        </div>
    </main>
    <script src="{{ URL::asset('js/app.js') }}"></script>

</body>
</html>