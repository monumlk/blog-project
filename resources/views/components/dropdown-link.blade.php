<a
    {{ $attributes->merge([
        'class' => 'd-block w-100 px-4 py-2 text-start text-sm leading-5 text-secondary'
    ]) }}>

    {{ $slot }}
</a>
