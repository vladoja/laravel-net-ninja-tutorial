<x-layout>
    <form action="{{ route('dojos.update', $dojo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h2>Edit Dojo</h2>
        <!-- Dojo Name -->
        <label for="name">Dojo Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $dojo->name) }}">

        <!-- Dojo Location -->
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="{{ old('location', $dojo->location) }}">

        <!-- Dojo Description -->
        <label for="description">Description:</label>
        <textarea rows="5" id="description" name="description">{{ old('description', $dojo->description) }}</textarea>

        <button type="submit" class="btn mt-4 bg-blue-600 hover:bg-blue-700 text-white">Update Dojo</button>
</x-layout>
