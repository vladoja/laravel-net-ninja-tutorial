@props([
    'ninjas' => null, // Collection of ninjas to display
    'id' => 'dlg-' . Str::ulid(),
    'title' => 'Ninjas in Dojo',
    'message' => 'List of ninjas.',
    'confirmText' => 'Confirm',
    'cancelText' => 'Close',
    'confirmBtnColorClasses' => 'bg-blue-600 hover:bg-blue-700 text-white',
])


@php
    $btnClass = $confirmBtnColorClasses ?? 'bg-slate-900 hover:bg-black text-white';
@endphp


{{-- Trigger button (text from slot or confirmText) --}}
<button type="button" onclick="openModal('{{ $id }}')"
    {{ $attributes->class('inline-block px-3 py-2 rounded ' . $btnClass) }}>
    {{ $slot ?: $confirmText }}
</button>

<x-modal :id="$id" :title="$title">

    <ul class="mt-4 space-y-2 max-h-60 overflow-y-auto">
        @forelse ($ninjas as $ninja)
            <li class="p-2 bg-gray-100 rounded">
                <strong>{{ $ninja->name }}</strong> - Skill: {{ $ninja->skill }}
            </li>
        @empty
            <li class="p-2 bg-gray-100 rounded">No ninjas found.</li>
        @endforelse
    </ul>


    <x-slot:footer>
        <form method="dialog">
            <button class="px-3 py-2 rounded border">{{ $cancelText }}</button>
        </form>
    </x-slot:footer>
</x-modal>
