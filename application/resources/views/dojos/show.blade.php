<x-layout>

    <div class="bg-gray-200 p-4 rounded text-left">
        <h2 class="text-lg font-semibold mt-4 mb-2">Dojo Information</h2>
        <p><strong>Name:</strong> {{ $dojo->name }}</p>
        <p><strong>Number of Ninjas:</strong> {{ $ninjas_count }}</p>
        <p><strong>Location:</strong> {{ $dojo->location }}</p>
        <p><strong>Description:</strong> {{ $dojo->description }}</p>
    </div>
    <x-confirm :action="route('dojos.destroy', $dojo)" method="DELETE" title="Delete Dojo?" message="This will permanently remove the dojo."
        confirmText="Delete">
        🗑️ Delete Dojo
    </x-confirm>
</x-layout>
