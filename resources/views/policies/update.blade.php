<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Update Policy') }}
        </h2>
    </x-slot>
    <div class="container py-12">
        <div class="space-y-10 divide-y divide-gray-900/10">
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
                                    <x-toggle>
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
            <div class="grid grid-cols-1 pt-10 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Policy Holder</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>
                </div>

                <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                                <div class="mt-2">
                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                                <div class="mt-2">
                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="col-span-full">
                                <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900">Street address</label>
                                <div class="mt-2">
                                    <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-2 sm:col-start-1">
                                <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                                <div class="mt-2">
                                    <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="region" class="block text-sm font-medium leading-6 text-gray-900">State / Province</label>
                                <div class="mt-2">
                                    <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">ZIP / Postal code</label>
                                <div class="mt-2">
                                    <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
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

            <div class="grid grid-cols-1 pt-10 gap-x-8 gap-y-8 md:grid-cols-3">
                <div class="px-4 sm:px-0">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Notifications</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">We'll always let you know about important changes, but you pick what else you want to hear about.</p>
                </div>

                <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2">
                    <div class="px-4 py-6 sm:p-8">
                        <div class="max-w-2xl space-y-10">
                            <fieldset>
                                <legend class="text-sm font-semibold leading-6 text-gray-900">By Email</legend>
                                <div class="mt-6 space-y-6">
                                    <div class="relative flex gap-x-3">
                                        <div class="flex items-center h-6">
                                            <input id="comments" name="comments" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="comments" class="font-medium text-gray-900">Comments</label>
                                            <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex items-center h-6">
                                            <input id="candidates" name="candidates" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="candidates" class="font-medium text-gray-900">Candidates</label>
                                            <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex items-center h-6">
                                            <input id="offers" name="offers" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="offers" class="font-medium text-gray-900">Offers</label>
                                            <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <legend class="text-sm font-semibold leading-6 text-gray-900">Push Notifications</legend>
                                <p class="mt-1 text-sm leading-6 text-gray-600">These are delivered via SMS to your mobile phone.</p>
                                <div class="mt-6 space-y-6">
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-everything" name="push-notifications" type="radio" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-600">
                                        <label for="push-everything" class="block text-sm font-medium leading-6 text-gray-900">Everything</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-email" name="push-notifications" type="radio" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-600">
                                        <label for="push-email" class="block text-sm font-medium leading-6 text-gray-900">Same as email</label>
                                    </div>
                                    <div class="flex items-center gap-x-3">
                                        <input id="push-nothing" name="push-notifications" type="radio" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-600">
                                        <label for="push-nothing" class="block text-sm font-medium leading-6 text-gray-900">No push notifications</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-4 border-t gap-x-6 border-gray-900/10 sm:px-8">
                        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                        <button type="submit" class="px-3 py-2 text-sm font-semibold text-white bg-blue-600 rounded-md shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
