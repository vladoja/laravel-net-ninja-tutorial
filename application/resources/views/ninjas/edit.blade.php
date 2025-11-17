<x-layout>
    <form action="{{ route('ninjas.update', $ninja->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h2>Edit Ninja</h2>

        <!-- ninja Name -->
        <label for="name">Ninja Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $ninja->name) }}" required>

        <!-- ninja Strength -->
        <label for="skill">Ninja Skill (0-100):</label>
        <input type="number" id="skill" name="skill" value="{{ old('skill', $ninja->skill) }}" required>

        <!-- ninja Bio -->
        <label for="bio">Biography:</label>
        <textarea rows="5" id="bio" name="bio" required>{{ old('bio', $ninja->bio) }}</textarea>



        <!-- select a dojo -->
        <label for="dojo_id">Dojo:</label>
        <select id="dojo_id" name="dojo_id" required>
            <option value="" disabled selected>Select a dojo</option>
            @foreach ($dojos as $dojo)
                <option value="{{ $dojo->id }}"
                    {{ old('dojo_id', $ninja->dojo_id) == $dojo->id ? 'selected' : '' }}>
                    {{ $dojo->name }}</option>
            @endforeach

        </select>

        <button type="submit" class="btn mt-4 bg-blue-600 hover:bg-blue-700 text-white">Update Ninja</button>

        <!-- validation errors -->
        @if ($errors->any())
            <div class="errors mt-4">
                <ul class="px-4 py-2 bg-red-100">
                    @foreach ($errors->all() as $error)
                        <li class="my-2 bg-red-500 text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</x-layout>
