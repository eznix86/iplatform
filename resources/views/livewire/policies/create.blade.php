<div class="container pt-12">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create New Policy') }}
        </h2>
    </x-slot>
    <div class="space-y-10 divide-y divide-gray-900/10">
        <div class="grid grid-cols-1 pt-10 gap-x-8 gap-y-8 md:grid-cols-3">
            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Policy Information</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">A policy can be assign to any users who log into the system.</p>
            </div>


            <form wire:submit="save" class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                <div class="px-4 py-6 sm:p-8">
                    <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="policy_effective_date" class="block text-sm font-medium leading-6 text-gray-900">Effective Date</label>
                            <div class="mt-2">
                                <x-date-picker wire:model='policy_effective_date' name="policy_effective_date" id="policy_effective_date" />
                            </div>
                            <x-input-error for="policy_effective_date" />
                        </div>

                        <div class="sm:col-span-3">
                            <label for="policy_expiration_date" class="block text-sm font-medium leading-6 text-gray-900">Expiration Date</label>
                            <div class="mt-2">
                                <x-date-picker wire:model='policy_expiration_date' name="policy_expiration_date" id="policy_expiration_date" />
                            </div>
                            <x-input-error for="policy_expiration_date" />
                        </div>

                        <div class="sm:col-span-4">
                            <label for="policy_type" class="block text-sm font-medium leading-6 text-gray-900">Policy Type</label>
                            <div class="mt-2">
                                <x-select wire:model='policy_type' id="policy_type">
                                    @foreach (\App\Enums\PolicyType::asSelectArray() as $key => $policyType)
                                    <option value="{{ $key }}">{{ $policyType }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <x-input-error for="policy_type" />
                        </div>

                        <div class="sm:col-span-4">
                            <label for="policy_status" class="block text-sm font-medium leading-6 text-gray-900">Policy Activation</label>
                            <div class="mt-2">
                                <x-toggle wire:model='policy_status' name="policy_status">
                                    <x-slot name="title">Activate</x-slot>
                                    <x-slot name="subtitle">(An active policy means that it is being paid)</x-slot>
                                </x-toggle>
                            </div>
                            <x-input-error for="policy_status" />
                        </div>
                        <div class="sm:col-span-4">
                            <label for="assign_users" class="block text-sm font-medium leading-6 text-gray-900">Assign to customers<span class="text-gray-500"> (Long-press <kbd>Ctrl</kbd> or <span class="text-lg">⌘</span> while selecting)</span>
                            </label>
                            <div class="mt-2">
                                <select wire:model='assign_users' id="assign_users" multiple name="assign_users" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach (\App\Models\User::role(\App\Enums\Roles::CUSTOMER->value)->get() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <x-input-error for="assign_users" />
                        </div>

                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-4 border-t gap-x-6 border-gray-900/10 sm:px-8">
                    <a href="{{  route('dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                    <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>
