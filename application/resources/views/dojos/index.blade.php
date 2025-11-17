<x-layout>
    <h2>Dojos List</h2>
    <div class="mb-4 flex justify-end">
        <x-confirm :action="route('dojos.create')" method="GET" title="Create Dojo?" message="Going to create a new dojo page."
            confirmText="Create" confirmBtnColorClasses="bg-green-600 hover:bg-green-700 text-white">
            ➕ Create
        </x-confirm>
    </div>
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
