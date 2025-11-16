<x-layout>
    <h2>Create Dojo</h2>
    <form action="{{ route('dojos.store') }}" method="POST">
        @csrf

        <!-- Dojo Name -->
        <label for="name">Dojo Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>

        <!-- Dojo Location -->
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="{{ old('location') }}" required>

        <!-- Dojo Description -->
        <label for="description">Description:</label>
        <textarea rows="5" id="description" name="description" required>{{ old('description') }}</textarea>

        <button type="submit" class="btn mt-4">Create Dojo</button>
    </form>
</x-layout>
