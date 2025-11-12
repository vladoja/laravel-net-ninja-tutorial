@props([
    'action', // required: form action URL
    'method' => 'DELETE', // HTTP verb for spoofing
    'title' => 'Are you sure?',
    'message' => 'This action cannot be undone.',
    'confirmText' => 'Delete',
    'cancelText' => 'Cancel',
    'variant' => 'danger', // 'danger' | 'primary'
    'id' => 'dlg-' . Str::ulid(),
])

@php
    $btnClass =
        $variant === 'danger' ? 'bg-red-600 hover:bg-red-700 text-white' : 'bg-slate-900 hover:bg-black text-white';
@endphp

{{-- Trigger button (you can also pass your own with slot if you prefer) --}}
<button type="button" onclick="document.getElementById('{{ $id }}').showModal()"
    {{ $attributes->class('inline-block px-3 py-2 rounded ' . $btnClass) }}>
    {{ $slot ?: $confirmText }}
</button>

<dialog id="{{ $id }}" class="rounded-lg backdrop:backdrop-blur-sm backdrop:bg-black/50 p-0">
    <div class="w-80 bg-white rounded-lg shadow">
        <div class="px-5 pt-5">
            <h2 id="{{ $id }}-title" class="text-lg font-semibold">{{ $title }}</h2>
            <p class="mt-2 text-sm text-slate-600">{{ $message }}</p>
        </div>

        <div class="px-5 pb-5 pt-4 flex justify-end gap-2">
            <form method="dialog">
                <button class="px-3 py-2 rounded border"> {{ $cancelText }} </button>
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
        </div>
    </div>
</dialog>
