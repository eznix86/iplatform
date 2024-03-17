<div class="container flex flex-col gap-4 py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Policy Detail') }}
        </h2>
    </x-slot>
    <section class="overflow-hidden bg-white sm:rounded-lg sm:shadow">
        <div class="px-4 py-5 bg-white border-b border-gray-200 sm:px-6">
            <div class="flex flex-wrap items-center justify-between -mt-2 -ml-4 sm:flex-nowrap">
                <div class="mt-2 ml-4">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Policy Information</h3>
                </div>
                <div class="flex-shrink-0 mt-2 ml-4">
                    <a href="{{ route('policies.update', $policy) }}" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        <svg class="mx-2 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Download Policy
                    </a>
                    <a href="{{ route('policies.download', $policy) }}" target="_blank" rel="noopener noreferrer" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        <svg class="mx-2 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>

                        Download Policy
                    </a>
                </div>
            </div>
        </div>

        <table class="mx-4 my-5 border-separate border-spacing-2">
            <tr>
                <th class="text-sm text-left">Policy Number</th>
                <td class="text-sm">{{ $policy->policy_no }}</td>
            </tr>
            <tr>
                <th class="text-sm text-left">Status</th>
                <td class="text-sm">{{ Str::ucfirst($policy->policy_status) }}</td>
            </tr>
            <tr>
                <th class="text-sm text-left">Type</th>
                <td class="text-sm">{{ Str::ucfirst($policy->policy_type) }}</td>
            </tr>
            <tr>
                <th class="text-sm text-left">Effective Date</th>
                <td class="text-sm">{{ $policy->policy_effective_date->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <th class="text-sm text-left">Expiration Date</th>
                <td class="text-sm">{{ $policy->policy_expiration_date->format('Y-m-d') }}</td>
            </tr>
        </table>
    </section>
    <section class="overflow-hidden bg-white sm:rounded-lg sm:shadow">
        <div class="px-4 py-5 bg-white border-b border-gray-200 sm:px-6">
            <h2 class="text-base font-semibold leading-6 text-gray-900">Policy Holder Information</h2>
        </div>
        <table class="mx-4 my-5 border-separate border-spacing-2">
            <tr>
                <th class="text-sm text-left">Name</th>
                <td class="text-sm">{{ $policy->policyHolder->full_name }}</td>
            </tr>
            <tr>
                <th class="text-sm text-left">Address</th>
                <td class="text-sm">{{ $policy->policyHolder->address->full_address }}</td>
            </tr>
        </table>
    </section>
    <section class="overflow-hidden bg-white sm:rounded-lg sm:shadow">
        <div class="px-4 py-5 bg-white border-b border-gray-200 sm:px-6">
            <h2 class="text-base font-semibold leading-6 text-gray-900">Drivers Information</h2>
        </div>
        <table class="w-full mx-4 my-5 border-separate border-spacing-2">
            <thead>
                <th class="text-sm text-left">Name</th>
                <th class="text-sm text-left">Age</th>
                <th class="text-sm text-left">Gender</th>
                <th class="text-sm text-left">Marital Status</th>
                <th class="text-sm text-left">License Number</th>
                <th class="text-sm text-left">State</th>
                <th class="text-sm text-left">Status</th>
                <th class="text-sm text-left">Effective Date</th>
                <th class="text-sm text-left">Expiration Date</th>
                <th class="text-sm text-left">Class</th>
            </thead>
            @foreach ($policy->drivers as $driver)

            <tr>
                <td class="text-sm">{{ $driver->full_name }}</td>
                <td class="text-sm">{{ (int) (new \Carbon\Carbon($driver->date_of_birth))->diffInYears(now()) }}</td>
                <td class="text-sm">{{ Str::ucfirst($driver->gender) }}</td>
                <td class="text-sm">{{ Str::ucfirst($driver->marital_status) }}</td>
                <td class="text-sm">{{ $driver->license_number }}</td>
                <td class="text-sm">{{ Str::upper($driver->license_state) }}</td>
                <td class="text-sm">{{ Str::ucfirst($driver->license_status) }}</td>
                <td class="text-sm">{{ $driver->license_effective_date->format('Y-m-d') }}</td>
                <td class="text-sm">{{ $driver->license_expiration_date->format('Y-m-d') }}</td>
                <td class="text-sm">{{ Str::upper($driver->license_class) }}</td>
            </tr>
            @endforeach
        </table>
    </section>
    <section class="overflow-hidden bg-white sm:rounded-lg sm:shadow">
        <div class="px-4 py-5 bg-white border-b border-gray-200 sm:px-6">
            <h2 class="text-base font-semibold leading-6 text-gray-900 ">Vehicles Information</h2>
        </div>
        @foreach ($policy->vehicles as $vehicle)
        <div class="flex gap-2 mb-2 {{ $loop->last ? '' : 'border-b border-gray-200' }}">
            <div class="w-1/2 px-6 py-5 border-r border-gray-200">
                <h3 class="font-bold text-blue-800 text-normal">Vehicle: {{ Str::ucfirst($vehicle->make) }} {{ Str::ucfirst($vehicle->model) }}</h3>
                <table class="border-separate border-spacing-2">
                    <tr>
                        <th class="text-sm text-left ">Year</th>
                        <td class="text-sm ">{{ $vehicle->year }}</td>
                    </tr>
                    <tr>
                        <th class="text-sm text-left ">Make</th>
                        <td class="text-sm ">{{ Str::ucfirst($vehicle->make) }}</td>
                    </tr>
                    <tr>
                        <th class="text-sm text-left ">Model</th>
                        <td class="text-sm ">{{ Str::ucfirst($vehicle->model) }}</td>
                    </tr>
                    <tr>
                        <th class="text-sm text-left ">VIN</th>
                        <td class="text-sm ">{{ $vehicle->vin }}</td>
                    </tr>
                    <tr>
                        <th class="text-sm text-left ">Usage</th>
                        <td class="text-sm ">{{ Str::ucfirst($vehicle->usage) }}</td>
                    </tr>
                    <tr>
                        <th class="text-sm text-left ">Primary Use</th>
                        <td class="text-sm ">{{ Str::ucfirst($vehicle->primary_use) }}</td>
                    </tr>
                    <tr>
                        <th class="text-sm text-left">Annual Mileage</th>
                        <td class="text-sm">{{ $vehicle->annual_mileage }}</td>
                    </tr>
                    <tr>
                        <th class="text-sm text-left">Ownership</th>
                        <td class="text-sm">{{ Str::ucfirst($vehicle->ownership) }}</td>
                    </tr>
                    <tr>
                        <th class="text-sm text-left ">Garaging Address</th>
                        <td class="text-sm">{{ $vehicle->garagingAddress->full_address }}</td>
                    </tr>
                </table>
            </div>
            <div class="w-1/2 px-4 py-5 mb-2">
                <h3 class="font-bold text-blue-800 text-normal">Coverages</h3>
                <table class="mx-4 my-5 border-separate border-spacing-2">
                    <tr>
                        <th class="text-sm text-left">Type</th>
                        <th class="text-sm text-left">Limit</th>
                        <th class="text-sm text-left">Deductible</th>
                    </tr>

                    @foreach ($vehicle->coverages as $coverage)
                    <tr>
                        <td class="text-sm">{{ Str::ucfirst($coverage->type) }}</td>
                        <td class="text-sm">{{ $coverage->limit }}</td>
                        <td class="text-sm">{{ $coverage->deductible }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        @endforeach
    </section>
</div>
