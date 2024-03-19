<div class="container py-12 space-y-4">
    <div class="flex justify-end w-full gap-4">
        <x-input name="search" placeholder="Search Policy..." wire:model.live='search' />
        @can('create', App\Models\Policy::class)
        <a href="{{ route('policies.create') }}" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            New Policy
        </a>
        @endcan
    </div>
    <div class="overflow-hiddenshadow-xl sm:rounded-lg">
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full">
                    <div class="overflow-hidden bg-white border rounded-lg">
                        <table class="min-w-full divide-y divide-neutral-200">
                            <thead class="bg-neutral-50">
                                <tr class="text-neutral-500">
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Policy No.</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Status</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Type</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Effective Date</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Expiration Date</th>
                                    <th class="px-5 py-3 text-xs font-medium text-left uppercase">Policy Holder</th>
                                    <th class="px-5 py-3 text-xs font-medium text-right uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-200">
                                @foreach ($policies as $policy)
                                <tr class="text-neutral-800">
                                    <td class="px-5 py-4 text-sm font-medium whitespace-nowrap">{{ $policy->policy_no }}</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $policy->policy_status }}</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $policy->policy_type }}</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $policy->policy_effective_date->format('Y M d') }}</td>
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $policy->policy_expiration_date->format('Y M d') }}</td>
                                    @if($policy->policyHolder()->exists())
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $policy->policyHolder->full_name }}</td>
                                    @else
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">N/A</td>
                                    @endif
                                    <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="{{ route('policies.show', $policy) }}" class="text-blue-600 hover:text-blue-700">View</a>
                                        @can('update', $policy)
                                        |
                                        <a class="text-blue-600 hover:text-blue-700" href="{{ route('policies.update', $policy) }}">Edit</a>
                                        @endcan
                                        @can(\App\Enums\Permissions::DOWNLOAD_PDF->value, $policy)
                                        |
                                        <a class="text-blue-600 hover:text-blue-700" href="{{ route('policies.download', $policy) }}" target="_blank" rel="noopener noreferrer">Download</a>
                                        @endcan
                                        @can('delete', $policy) |
                                        <a class="text-blue-600 hover:text-blue-700" href="{{ route('policies.destroy', $policy) }}">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-4 ">
                        {{ $policies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
