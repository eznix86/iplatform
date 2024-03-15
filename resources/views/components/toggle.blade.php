@props(['title'])

<div class="flex items-center">
    <!-- Enabled: "bg-blue-600", Not Enabled: "bg-gray-200" -->
    <button type="button" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out bg-gray-200 border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2" role="switch" aria-checked="false" aria-labelledby="annual-billing-label">
        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
        <span aria-hidden="true" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform translate-x-0 bg-white rounded-full shadow pointer-events-none ring-0"></span>
    </button>
    <span class="ml-3 text-sm" id="annual-billing-label">
        <span class="font-medium text-gray-900">{{ $title }}</span>
        @if($subtitle)
        <span class="text-gray-500">{{ $subtitle }}</span>
        @endif
    </span>
</div>
