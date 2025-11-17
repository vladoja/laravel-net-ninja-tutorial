@props([
    'value' => '',
    'delay' => 100, // ms
])

<form id="ninja-search-form" method="GET" action="{{ route('ninjas.index') }}" class="mb-4">
    <input id="ninja-search-input" type="text" name="search" value="{{ $value }}"
        placeholder="Search ninjas by name..." class="w-full rounded border px-3 py-2" autocomplete="off">
</form>

<script>
    (function() {
        const input = document.getElementById('ninja-search-input');
        const form = document.getElementById('ninja-search-form');
        if (!input || !form) return;

        let timeout = null;

        input.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(function() {
                // submit as GET -> only "search" param, page resets to 1
                form.submit();
            }, {{ $delay }});
        });
    })();
</script>
