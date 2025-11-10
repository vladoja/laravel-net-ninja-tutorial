<x-layout>
    <h2>{{ $ninja['name'] }}</h2>

    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Skill Level:</strong> {{ $ninja['skill'] }}</p>
        <p><strong>About me:</strong></p>
        <p>{{ $ninja['bio'] }}</p>
    </div>
</x-layout>
