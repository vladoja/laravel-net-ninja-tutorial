<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Ninja Network</title>
</head>

<body class="text-center px-8 py-12">
    <h1>Welcome to the Ninja Network!</h1>
    <p>Click the button to view the list of ninjas.</p>
    <a href="/ninjas" class="btn mt-4 inline-block">View Ninjas</a>

</html>
