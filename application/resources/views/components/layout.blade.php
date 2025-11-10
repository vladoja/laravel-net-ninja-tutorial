<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Ninja Network</title>
</head>

<body class="text-center">
    <header>
        <nav>
            <h1><a href="/">Ninja Network</a></h1>
            <a href="/ninjas">All ninjas</a>
            <a href="/ninjas/create">Create ninja</a>
        </nav>
    </header>

    <main class="container">{{ $slot }}</main>

</body>

</html>
