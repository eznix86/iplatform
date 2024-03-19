<div class="container flex flex-col gap-4 py-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Update Policy') }}
        </h2>
    </x-slot>
    <section class="overflow-hidden bg-white sm:rounded-lg sm:shadow">
        <div class="px-4 py-5 bg-white border-b border-gray-200 sm:px-6">
            <div class="flex flex-wrap items-center justify-between -mt-2 -ml-4 sm:flex-nowrap">
                <div class="mt-2 ml-4">
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Policy Information</h3>
                </div>
                <div class="flex-shrink-0 mt-2 ml-4">
                    <a href="{{ route('policies.destroy', $policy['id']) }}" class="relative inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-red-600 rounded-md shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                        <svg class="mx-2 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>

                        Delete Policy
                    </a>
                </div>
            </div>
        </div>

        <form wire:submit="updatePolicy">
            <table class="mx-4 my-5 border-separate border-spacing-2">
                <tr>
                    <th class="text-sm text-left">Policy Number</th>
                    <td class="text-sm font-bold">{{ $policy->policy_no }}</td>
                </tr>
                <tr>
                    <th class="text-sm text-left">Status</th>
                    <td class="flex items-center gap-2">
                        <x-select wire:model="policy_form.policy_status" name="policy_form.policy_status" placeholder="true" value="{{ $policy->policy_status }}">
                            @foreach(\App\Enums\PolicyStatus::asSelectArray() as $value => $label)
                            <option value="{{ $value }}" selected="{{ $policy->policy_status  == $value }}">{{ $label }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="policy_form.policy_status" />
                    </td>
                </tr>
                <tr>
                    <th class="text-sm text-left">Type</th>
                    <td class="flex items-center gap-2">
                        <x-select wire:model="policy_form.policy_type" name="policy_form.policy_type" placeholder="true">
                            @foreach(\App\Enums\PolicyType::asSelectArray() as $value => $label)
                            <option value="{{ $value }}" selected="{{ $policy->policy_type  == $value }}">{{ $label }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="policy_form.policy_type" />
                    </td>
                </tr>
                <tr>
                    <th class="text-sm text-left">Effective Date</th>
                    <td class="flex items-center gap-2">
                        <x-date-picker wire:model="policy_form.policy_effective_date" name="policy_form.policy_effective_date" id="policy_form.policy_effective_date" />
                        <x-input-error for="policy_form.policy_effective_date" />
                    </td>
                </tr>
                <tr>
                    <th class="text-sm text-left">Expiration Date</th>
                    <td class="flex items-center gap-2">
                        <x-date-picker wire:model="policy_form.policy_expiration_date" name="policy_form.policy_expiration_date" id="policy_form.policy_expiration_date" />
                        <x-input-error for="policy_form.policy_expiration_date" />
                    </td>
                </tr>
            </table>
            <div class="flex justify-start px-4 py-5 bg-white sm:px-6">
                <x-button type="submit" class="bg-blue-600 hover:bg-blue-500">
                    {{ __('Update Policy') }}
                </x-button>
            </div>
        </form>
    </section>
    <section class="overflow-hidden bg-white sm:rounded-lg sm:shadow">
        <div class="px-4 py-5 bg-white border-b border-gray-200 sm:px-6">
            <h2 class="text-base font-semibold leading-6 text-gray-900">Policy Holder Information</h2>
        </div>
        <form wire:submit='updatePolicyHolder'>

            <table class="mx-4 my-5 border-separate border-spacing-2">
                <tr>
                    <th class="text-sm text-left">Name</th>
                    <td class="flex gap-4">
                        <div>
                            <x-input-slim wire:model='policy_holder_form.first_name' name="policy_holder_form.first_name" placeholder="First Name" />
                            <x-input-error for="policy_holder_form.first_name" />
                        </div>
                        <div>
                            <x-input-slim wire:model='policy_holder_form.last_name' name="policy_holder_form.last_name" placeholder="First Name" />
                            <x-input-error for="policy_holder_form.last_name" />
                        </div>
                    </td>
                </tr>

                <tr>
                    <th class="text-sm text-left">Address</th>
                    <td class="flex gap-4">
                        <div>
                            <x-input-slim wire:model='policy_holder_form.street' name="policy_holder_form.street" placeholder="Street" />
                            <x-input-error for="policy_holder_form.street" />
                        </div>
                        <div>
                            <x-input-slim wire:model='policy_holder_form.city' name="policy_holder_form.city" placeholder="City" />
                            <x-input-error for="policy_holder_form.city" />
                        </div>
                        <div>
                            <x-select wire:model='policy_holder_form.state' name="policy_holder_form.state" placeholder="State">
                                <option value="">Please select Your state</option>
                                @foreach(\App\Enums\LicenseState::asSelectArray() as $value => $label)
                                <option value="{{ $value }}" selected="" {{ $policy->policyHolder->address->state == $value}}>{{ Str::upper($label) }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error for="policy_holder_form.state" />
                        </div>
                        <div>
                            <x-input-slim wire:model='policy_holder_form.zip' name="policy_holder_form.zip" placeholder="Zip" />
                            <x-input-error for="policy_holder_form.zip" />
                        </div>
                    </td>
                </tr>
            </table>
            <div class="flex justify-start px-4 py-5 bg-white sm:px-6">
                <x-button type="submit" class="bg-blue-600 hover:bg-blue-500">
                    {{ __('Update Policy Holder') }}
                </x-button>
            </div>
        </form>
    </section>
    <section class="overflow-hidden bg-white sm:rounded-lg sm:shadow">
        <div class="px-4 py-5 bg-white border-b border-gray-200 sm:px-6">
            <h2 class="text-base font-semibold leading-6 text-gray-900">Drivers Information</h2>
        </div>
        <table class="w-3/4 mx-4 my-5 border-separate border-spacing-2">
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
                <th class="text-sm text-right">Actions</th>

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
                <td class="flex justify-end gap-2">
                    <button wire:click='deleteDriver({{ $driver->id }})' class="text-red-600 hover:text-red-500">Delete</button>
                </td>
            </tr>
            @endforeach
        </table>
        <x-button wire:click="$dispatch('add-driver-pop-up:show')" class="mx-6 my-4 bg-blue-500">Add more drivers</x-button>
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
                    <tr>
                        <th class="text-sm text-left ">Actions</th>
                        <td class="text-sm">
                            <button wire:click='deleteVehicle({{ $vehicle->id }})' class="text-red-600 hover:text-red-500">Delete</button>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="w-1/2 px-4 py-5 mb-2">
                <h3 class="font-bold text-blue-800 text-normal">Coverages for {{ Str::ucfirst($vehicle->make) }} {{ Str::ucfirst($vehicle->model) }} </h3>
                <table class="my-5 border-separate border-spacing-2">
                    <tr>
                        <th class="text-sm text-left">Type</th>
                        <th class="text-sm text-left">Limit</th>
                        <th class="text-sm text-left">Deductible</th>
                        <th class="text-sm text-left">Actions</th>
                    </tr>

                    @foreach ($vehicle->coverages as $coverage)
                    <tr>
                        <td class="text-sm">{{ Str::ucfirst($coverage->type) }}</td>
                        <td class="text-sm">{{ $coverage->limit }}</td>
                        <td class="text-sm">{{ $coverage->deductible }}</td>
                        <td class="text-sm">
                            <button wire:click='deleteCoverage({{ $coverage->id }})' class="text-red-600 hover:text-red-500">Delete</button>
                        </td>
                    </tr>

                    @endforeach
                </table>
                <x-button wire:click="$dispatch('add-coverage-pop-up:show', {vehicleId: {{ $vehicle->id }}})" class="bg-blue-500">Add coverages for {{ Str::ucfirst($vehicle->make) }} {{ Str::ucfirst($vehicle->model) }}</x-button>
            </div>
        </div>
        @endforeach
        <x-button wire:click="$dispatch('add-vehicle-pop-up:show')" class="mx-6 my-4 bg-blue-500">Add more Vehicles</x-button>
    </section>
    @livewire('add-driver-pop-up', ['policy' => $policy])
    @livewire('add-vehicle-pop-up', ['policy' => $policy])
    @livewire('add-coverage-pop-up')
</div>
