@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'd-block w-100 ps-3 pe-4 py-2 border border-primary text-start fs-5 text-primary'
            : 'd-block w-100 ps-3 pe-4 py-2 border border-secondary text-start fs-5 text-secondary'
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
