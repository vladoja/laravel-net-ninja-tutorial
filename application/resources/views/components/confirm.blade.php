@props([
    'action', // required: form action
    'method' => 'DELETE',
    'title' => 'Are you sure?',
    'message' => 'This action cannot be undone.',
    'confirmText' => 'Confirm',
    'cancelText' => 'Cancel',
    'variant' => 'danger',
    'id' => 'dlg-' . Str::ulid(),
])

@php
    $btnClass =
        $variant === 'danger' ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-slate-900 hover:bg-black text-white';
@endphp

{{-- Trigger button (text from slot or confirmText) --}}
<button type="button" onclick="openModal('{{ $id }}')"
    {{ $attributes->class('inline-block px-3 py-2 rounded ' . $btnClass) }}>
    {{ $slot ?: $confirmText }}
</button>

<x-modal :id="$id" :title="$title">
    <p class="text-sm text-slate-600">{{ $message }}</p>

    <x-slot:footer>
        <form method="dialog">
            <button class="px-3 py-2 rounded border">{{ $cancelText }}</button>
        </form>

        <form method="POST" action="{{ $action }}">
            @csrf
            @if (!in_array(strtoupper($method), ['GET', 'POST']))
                @method($method)
            @endif
            <button type="submit" class="px-3 py-2 rounded {{ $btnClass }}">
                {{ $confirmText }}
            </button>
        </form>
    </x-slot:footer>
</x-modal>
