@props(['label', 'type' => 'text'])

<div class="mb-6">
    <label for="{{ $label }}"
           class="block mb-2 uppercase font-bold text-xs text-gray-700">
        {{ $label }}
    </label>

    <input type="{{ $type }}"
           name="{{ $label }}"
           id="{{ $label }}"
           required
           value="{{ old($label) }}"
           placeholder="Write your {{ $label }}.."
           class="border border-gray-400 p-2 w-full rounded-xl">

    <x-form-error-component :name="$label"/>
</div>
