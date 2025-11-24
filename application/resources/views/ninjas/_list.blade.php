<div class="space-y-2">
    @forelse ($ninjas as $ninja)
        <div class="p-3 border rounded">
            <strong>{{ $ninja->name }}</strong> – Skill: {{ $ninja->skill }}
        </div>
    @empty
        <div class="p-3 border rounded bg-gray-50">
            No ninjas found.
        </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $ninjas->links() }}
</div>
