<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Politie systeem</title>

    <!-- CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- USER id -->
    <meta name="user-id" content="{{ optional(Auth::user())->id }}">

    <!-- CSS -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @routes
</head>
<body class="font-Nunito font-normal text-black leading-normal">
<div id="app" class="flex flex-col min-h-screen">

    <!--Main content-->
    <main class="relative flex flex-1 flex-col">
        @yield('content')
    </main>
</div>

<!-- JS -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
