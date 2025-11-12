<x-layout>
    <h2>Dojos List</h2>
    <ul>
        @if (count($dojos) > 0)
            @foreach ($dojos as $dojo)
                <li>
                    <x-card href="{{ route('dojos.show', ['id' => $dojo['id']]) }}">
                        <h3>{{ $dojo->name }}</h3>
                    </x-card>
                </li>
            @endforeach
        @else
            <li>No dojos found</li>
        @endif
    </ul>

</x-layout>
