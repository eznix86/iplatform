<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create New Policy') }}
        </h2>
    </x-slot>
    <div class="container pt-12">
        <div class="space-y-10 divide-y divide-gray-900/10">
            @livewire('policies.create')
        </div>

    </div>
</x-app-layout>
