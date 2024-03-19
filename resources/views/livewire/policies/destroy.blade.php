<div class="container py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Delete Policy') }}
        </h2>
    </x-slot>

    <div class="max-w-full bg-white border rounded-lg shadow-sm p-7 border-neutral-200/60">
        <h5 class="text-xl font-semibold leading-none tracking-tight text-neutral-900">Are you sure you want to delete Policy No. <span class="font-bold">{{ $policy->policy_no }}</span> ?</h5>
        <p class="mb-4 text-neutral-500">This action is not reverisble! Policy Holder, Drivers, and Vehicles with its coverage will all be deleted.</p>
        <a href="{{ route('policies.show', $policy->id ) }}" class="inline-flex items-center justify-between w-auto h-10 px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none hover:bg-blue-600/90">
            <span>No, I want to review first.</span>
        </a>
        <button wire:click='delete' class="inline-flex items-center justify-between w-auto h-10 px-4 py-2 text-sm font-medium text-white transition-colors bg-red-600 rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none hover:bg-red-600/90">
            <span>Yes, I know what I am doing. Delete Now!</span>
        </button>
    </div>
</div>
