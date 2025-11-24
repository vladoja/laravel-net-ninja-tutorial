<x-layout>
    <h2>Welcome to the Ninja Network</h2>
    <div class="mb-4 flex justify-end">
        <x-confirm :action="route('ninjas.create')" method="GET" title="Create Ninja?" message="This will create a new ninja."
            confirmText="Create" confirmBtnColorClasses="bg-green-600 hover:bg-green-700 text-white">
            ➕ Create
        </x-confirm>
    </div>

    <x-ninja-search :value="$search" />
    {{-- this container will be dynamically replaced by HTMX --}}
    <div id="ninjas-list">
        @include('ninjas._list', ['ninjas' => $ninjas, 'search' => $search])
    </div>
</x-layout>
