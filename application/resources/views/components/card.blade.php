@props(['highlight' => false])
<div @class(['highlight' => $highlight, 'card'])>
    {{ $slot }}
    <a href="" class="btn">View Details</a>
</div>
