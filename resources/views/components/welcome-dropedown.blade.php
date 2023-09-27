@props(['btn'])

<div x-data="{ show : false }" @click.away=" show = false  " class="relative">

    {{--    trigger section --}}
    <div @click="show = ! show">

        {{ $btn }}

    </div>

    {{--    links section --}}

    <div x-show="show" class="max-h-44 py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50" style="display: none;">
        {{ $slot }}
    </div>
</div>
