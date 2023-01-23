<DOCTYPE HTML>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ mix('js/app.js') }}" defer></script>
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>

    <body>
        @yield('content')
    </body>

    </html>
