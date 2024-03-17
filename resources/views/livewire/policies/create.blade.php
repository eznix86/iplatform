<div class="grid grid-cols-1 pt-10 gap-x-8 gap-y-8 md:grid-cols-3">
    <div class="px-4 sm:px-0">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Policy Information</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">A policy can be assign to any users who log into the system.</p>
    </div>

    <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
        <div class="px-4 py-6 sm:p-8">
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="effective-date" class="block text-sm font-medium leading-6 text-gray-900">Effective Date</label>
                    <div class="mt-2">
                        <x-date-picker name="effective-date" id="effective-date" />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="expiration-date" class="block text-sm font-medium leading-6 text-gray-900">Expiration Date</label>
                    <div class="mt-2">
                        <x-date-picker name="expiration-date" id="expiration-date" />
                    </div>
                </div>


                <div class="sm:col-span-4">
                    <label for="policy-type" class="block text-sm font-medium leading-6 text-gray-900">Policy Type</label>
                    <div class="mt-2">
                        <select id="policy-type" name="policy-type" autocomplete="policy-type-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            @foreach (\App\Enums\PolicyType::asSelectArray() as $key => $policyType)
                            <option value="{{ $key }}">{{ $policyType }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="activate-policy" class="block text-sm font-medium leading-6 text-gray-900">Policy Activation</label>
                    <div class="mt-2">
                        <x-toggle wire:model='enabled' name="activate-policy">
                            <x-slot name="title">Activate</x-slot>
                            <x-slot name="subtitle">(An active policy means that it cannot be changed anymore.)</x-slot>
                        </x-toggle>
                    </div>
                </div>
                <div class="sm:col-span-4">
                    <label for="assign-user" class="block text-sm font-medium leading-6 text-gray-900">Assign to users<span class="text-gray-500"> (Long-press <kbd>Ctrl</kbd> or <span class="text-lg">⌘</span> while selecting)</span>
                    </label>
                    <div class="mt-2">
                        <select id="assign-user" multiple name="assign-user" autocomplete="assign-user" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            @foreach (\App\Models\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                            <option value="1">User 1</option>
                            <option value="2">User 2</option>
                            <option value="3">User 3</option>
                            <option value="4">User 4</option>
                            <option value="5">User 5</option>
                        </select>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex items-center justify-end px-4 py-4 border-t gap-x-6 border-gray-900/10 sm:px-8">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save</button>
        </div>
    </form>
</div>
