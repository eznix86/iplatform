<div class="container py-12 space-y-4">
    <div class="flex justify-end w-full gap-4">
        <x-input name="search" placeholder="Search Policy..." wire:model.live='search' />
        @can('create', App\Models\Policy::class)
        <x-button>Add New Policy</x-button>
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
                                    <th class="px-5 py-3 text-xs font-medium text-right uppercase">Action</th>
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
                                    <td class="px-5 py-4 text-sm whitespace-nowrap">{{ $policy->policyHolder->full_name }}</td>
                                    <td class="px-5 py-4 text-sm font-medium text-right whitespace-nowrap">
                                        @cannot('view', $policy)
                                        <a href="{{ route('policies.show', $policy) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                        @else
                                        <a class="text-blue-600 hover:text-blue-700" href="#">Edit</a>
                                        @endcannot
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="py-4">
                        {{ $policies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
