@props([
    'id' => 'dlg-' . Str::ulid(),
    'title' => null,
])

{{-- Trigger: use with JS -> document.getElementById(id).showModal() --}}
<dialog id="{{ $id }}" class="rounded-lg backdrop:backdrop-blur-sm backdrop:bg-black/50 p-0">
    <div class="bg-white rounded-lg shadow w-[24rem] max-w-[95vw]">
        <div class="px-5 pt-5">
            @if ($title)
                <h2 class="text-lg font-semibold">{{ $title }}</h2>
            @endif
            <div class="mt-3">
                {{ $slot }} {{-- body --}}
            </div>
        </div>

        <div class="px-5 pb-5 pt-4 flex justify-end gap-2">
            {{-- default footer slot (can be overwritten) --}}
            {{ $footer ?? '' }}
        </div>
    </div>
</dialog>
