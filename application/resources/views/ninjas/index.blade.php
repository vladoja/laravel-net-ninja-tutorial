<x-layout>
    <h2>Welcome to the Ninja Network</h2>
    <div class="mb-4 flex justify-end">
        <x-confirm :action="route('ninjas.create')" method="GET" title="Create Ninja?" message="This will create a new ninja."
            confirmText="Create" confirmBtnColorClasses="bg-green-600 hover:bg-green-700 text-white">
            ➕ Create
        </x-confirm>
    </div>

    <x-ninja-search :value="$search" />
    <ul>

        @if (count($ninjas) > 0)
            @foreach ($ninjas as $ninja)
                <li>
                    <x-card href="{{ route('ninjas.show', ['id' => $ninja['id']]) }}" :highlight="$ninja['skill'] > 70">
                        <div>
                            <h3>{{ $ninja['name'] }}</h3>
                            <p>Dojo: {{ $ninja->dojo->name ?? 'No Dojo' }}</p>
                        </div>
                        <p>Skill: {{ $ninja['skill'] }}</p>
                    </x-card>
                </li>
            @endforeach
        @else
            <li>No ninjas found.</li>
        @endif
    </ul>
    {{ $ninjas->links() }}
</x-layout>
