<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Ninja Network</title>
</head>

<body>
    <header>
        <nav>
            <h1>Ninja Network</h1>
            <a href="/ninjas">All ninjas</a>
            <a href="/ninjas/create">Create ninja</a>
        </nav>
    </header>

    <main class="container">{{ $slot }}</main>

</body>

</html>
