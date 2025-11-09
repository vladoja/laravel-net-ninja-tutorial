<x-layout>
    <h2>Welcome to the Ninja Network</h2>
    <p>Greeting: {{ $greeting }}</p>
    <ul>
        @if (count($ninjas) > 0)
            @foreach ($ninjas as $ninja)
                <li>
                    <x-card href="{{ url('/ninjas/' . $ninja['id']) }}" :highlight="$ninja['skill'] > 70">
                        <h3>{{ $ninja['name'] }}</h3>
                        <p>Skill: {{ $ninja['skill'] }}</p>
                    </x-card>
                </li>
            @endforeach
        @else
            <li>No ninjas found.</li>
        @endif
    </ul>
</x-layout>
