<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Ninja Network</title>
</head>
<script>
    // open modal by id
    function openModal(id) {
        document.getElementById(id)?.showModal();
    }

    // optional: close when clicking backdrop
    document.addEventListener('click', (e) => {
        const dlg = e.target;
        if (dlg instanceof HTMLDialogElement && e.target === dlg) dlg.close();
    });
</script>

<body class="text-center">
    @if (session('success'))
        <div id="flash"
            class="relative p-4 pr-10 bg-green-100 text-green-900 font-semibold rounded border border-green-300 shadow">
            <span>{{ session('success') }}</span>
            <button type="button" onclick="document.getElementById('flash').remove()" class="flash-close-btn"
                aria-label="Close">&times;</button>
        </div>
    @endif
    <header>
        <nav>
            <h1><a href="/">Ninja Network</a></h1>
            @guest
                <a href="{{ route('show.login') }}" class="btn">Login</a>
                <a href="{{ route('show.register') }}" class="btn">Register</a>
            @endguest

            @auth
                <a href="{{ route('ninjas.index') }}">Ninjas</a>
                <a href="{{ route('dojos.index') }}">Dojos</a>
                <span class="border-r-2 pr-2">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn">Logout</button>
                </form>
            </nav>
        @endauth
    </header>

    <main class="container">{{ $slot }}</main>

</body>

</html>
