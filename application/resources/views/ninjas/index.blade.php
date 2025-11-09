<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network | Home</title>
</head>

<body>
    <h2>Welcome to the Ninja Network</h2>
    <p>Greeting: {{ $greeting }}</p>
    <ul>
        @if (count($ninjas) > 0)
            @foreach ($ninjas as $ninja)
                <li><a href="{{ url('/ninjas/' . $ninja['id']) }}">{{ $ninja['name'] }} - Skill: {{ $ninja['skill'] }},
                        Age: {{ $ninja['age'] }}</a>
                </li>
            @endforeach
        @else
            <li>No ninjas found.</li>
        @endif
    </ul>

</body>

</html>
