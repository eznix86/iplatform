<!DOCTYPE html>
<html lang="en">

@include('pdfs.policy._header')

<body>
    <div class="p-8">
        <div class="flex items-center justify-between">
            <x-application-logo class="size-32" />
            <p class="text-xs text-gray-400">Policy No. {{ $policy->policy_no }} generated at {{ now() }}</p>
        </div>

        <div class="flex flex-col items-center justify-center w-full">
            <h1 class="text-2xl font-black">Car4Sure Policy Document <span class="text-gray-600">{{ $policy->policy_no }}</span></h1>
        </div>
        <section class="break-inside-avoid-page">
            <h2 class="my-4 text-2xl font-bold text-blue-800">Policy Information</h2>
            <table>
                <tr>
                    <th class="text-sm">Policy Number</th>
                    <td class="text-sm">{{ $policy->policy_no }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Status</th>
                    <td class="text-sm">{{ Str::ucfirst($policy->policy_status) }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Type</th>
                    <td class="text-sm">{{ Str::ucfirst($policy->policy_type) }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Effective Date</th>
                    <td class="text-sm">{{ $policy->policy_effective_date->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Expiration Date</th>
                    <td class="text-sm">{{ $policy->policy_expiration_date->format('Y-m-d') }}</td>
                </tr>
            </table>
        </section>
        <section class="break-inside-avoid-page">
            <h2 class="my-4 text-2xl font-bold text-blue-800">Policy Holder Information</h2>
            <table>
                <tr>
                    <th class="text-sm">Name</th>
                    <td class="text-sm">{{ $policy->policyHolder->full_name }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Address</th>
                    <td class="text-sm">{{ $policy->policyHolder->address->full_address }}</td>
                </tr>
            </table>
        </section>
        <section>
            <h2 class="my-4 text-2xl font-bold text-blue-800">Drivers Information</h2>
            <table class="break-inside-avoid-page">
                @foreach ($policy->drivers as $driver)
                <tr>
                    <th class="text-sm">Name</th>
                    <td class="text-sm">{{ $driver->full_name }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Age</th>
                    <td class="text-sm">{{ (int) (new \Carbon\Carbon($driver->date_of_birth))->diffInYears(now()) }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Gender</th>
                    <td class="text-sm">{{ Str::ucfirst($driver->gender) }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Marital Status</th>
                    <td class="text-sm">{{ Str::ucfirst($driver->marital_status) }}</td>
                </tr>
                <tr>
                    <th class="text-sm">License Number</th>
                    <td class="text-sm">{{ $driver->license_number }}</td>
                </tr>
                <tr>
                    <th class="text-sm">State</th>
                    <td class="text-sm">{{ Str::upper($driver->license_state) }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Status</th>
                    <td class="text-sm">{{ Str::ucfirst($driver->license_status) }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Effective Date</th>
                    <td class="text-sm">{{ $driver->license_effective_date->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Expiration Date</th>
                    <td class="text-sm">{{ $driver->license_expiration_date->format('Y-m-d') }}</td>
                </tr>
                <tr>
                    <th class="text-sm">Class</th>
                    <td class="text-sm">{{ Str::upper($driver->license_class) }}</td>
                </tr>
                @endforeach
            </table>
        </section>
        <section class="py-8">
            <h2 class="my-4 text-2xl font-bold text-blue-800">Vehicles Information</h2>
            @foreach ($policy->vehicles as $vehicle)
            <div class="flex gap-2 mb-2 break-inside-avoid-page">
                <div class="w-1/2 break-inside-avoid-page">
                    <h3 class="my-4 text-xl font-bold text-blue-800">Vehicle: {{ Str::ucfirst($vehicle->make) }} {{ Str::ucfirst($vehicle->model) }}</h3>
                    <table>
                        <tr>
                            <th class="text-sm">Year</th>
                            <td class="text-sm">{{ $vehicle->year }}</td>
                        </tr>
                        <tr>
                            <th class="text-sm">Make</th>
                            <td class="text-sm">{{ Str::ucfirst($vehicle->make) }}</td>
                        </tr>
                        <tr>
                            <th class="text-sm">Model</th>
                            <td class="text-sm">{{ Str::ucfirst($vehicle->model) }}</td>
                        </tr>
                        <tr>
                            <th class="text-sm">VIN</th>
                            <td class="text-sm">{{ $vehicle->vin }}</td>
                        </tr>
                        <tr>
                            <th class="text-sm">Usage</th>
                            <td class="text-sm">{{ Str::ucfirst($vehicle->usage) }}</td>
                        </tr>
                        <tr>
                            <th class="text-sm">Primary Use</th>
                            <td class="text-sm">{{ Str::ucfirst($vehicle->primary_use) }}</td>
                        </tr>
                        <tr>
                            <th class="text-sm">Annual Mileage</th>
                            <td class="text-sm">{{ $vehicle->annual_mileage }}</td>
                        </tr>
                        <tr>
                            <th class="text-sm">Ownership</th>
                            <td class="text-sm">{{ Str::ucfirst($vehicle->ownership) }}</td>
                        </tr>
                        <tr>
                            <th class="text-sm">Garaging Address</th>
                            <td class="text-sm">{{ $vehicle->garagingAddress->full_address }}</td>
                        </tr>
                    </table>
                </div>
                <div class="w-1/2 mb-2 break-inside-avoid-page">
                    <h3 class="my-4 text-xl font-bold text-blue-800">Coverages</h3>
                    <table>
                        <tr>
                            <th class="text-sm">Type</th>
                            <th class="text-sm">Limit</th>
                            <th class="text-sm">Deductible</th>
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
</body>

</html>
