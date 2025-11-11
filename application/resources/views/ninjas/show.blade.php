<x-layout>
    <h2>{{ $ninja['name'] }}</h2>

    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Skill Level:</strong> {{ $ninja['skill'] }}</p>
        <p><strong>About me:</strong></p>
        <p>{{ $ninja['bio'] }}</p>
    </div>

    <div class="border-2 border-dashed bg-white px-4 pb-4 rounded">
        <h3 class="text-lg font-semibold mt-4 mb-2">Dojo Information</h3>
        @if ($ninja->dojo)
            <p><strong>Name:</strong> {{ $ninja->dojo->name }}</p>
            <p><strong>Location:</strong> {{ $ninja->dojo->location }}</p>
            <p><strong>Description:</strong> {{ $ninja->dojo->description }}</p>
        @else
            <p>This ninja is not affiliated with any dojo.</p>
        @endif
    </div>
</x-layout>
