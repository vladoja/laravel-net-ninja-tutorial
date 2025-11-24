@props([
    'value' => '',
    'delay' => 100, // ms
])

<form id="ninja-search-form" class="mb-4" hx-get="{{ route('ninjas.index') }}" hx-target="#ninjas-list" hx-push-url="true"
    hx-trigger="keyup changed delay:{{ $delay }}ms from:#ninja-search-input, submit">
    <input id="ninja-search-input" type="text" name="search" value="{{ $value }}"
        placeholder="Search ninjas by name..." class="w-full rounded border px-3 py-2" autocomplete="off">
</form>
