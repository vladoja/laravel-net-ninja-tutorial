<x-layout>
    <h2>Welcome to the Ninja Network</h2>
    <p>Greeting: {{ $greeting }}</p>
    <ul>
        @if (count($ninjas) > 0)
            @foreach ($ninjas as $ninja)
                <li>
                    <p>{{ $ninja['name'] }} - Skill: {{ $ninja['skill'] }}, Age: {{ $ninja['age'] }}</p>
                    <a href="{{ url('/ninjas/' . $ninja['id']) }}">View Details</a>
                </li>
            @endforeach
        @else
            <li>No ninjas found.</li>
        @endif
    </ul>
</x-layout>
