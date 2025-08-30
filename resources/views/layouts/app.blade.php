<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>@yield('title', config('app.name'))</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap">
    <link rel="shortcut icon" href="{{ asset('personal-acc/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('personal-acc/css/style.min.css') }}">
    @stack('styles')
</head>
<body>
    @yield('content')
    <script src="{{ asset('personal-acc/js/app.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
