@props(['title'])

<div class="flex items-center">
    <button x-data="{ enabled: @entangle($attributes->wire('model')) }" x-on:click="$dispatch('toggle-switch')" type="button" :class="{'bg-blue-600': enabled,'bg-gray-200': !enabled}" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2" role="switch" aria-checked="false" aria-labelledby="annual-billing-label">
        <span aria-hidden="true" :class="{'translate-x-5': enabled,'translate-x-0': !enabled}" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full shadow pointer-events-none ring-0"></span>
    </button>
    <span class="ml-3 text-sm" id="annual-billing-label">
        <span class="font-medium text-gray-900">{{ $title }}</span>
        @if($subtitle)
        <span class="text-gray-500">{{ $subtitle }}</span>
        @endif
    </span>
</div>
