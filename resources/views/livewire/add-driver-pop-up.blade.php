<x-dialog-modal wire:model.live="showModal">
    <x-slot name="title">
        {{ __('Add Driver') }}
    </x-slot>
    <x-slot name="content">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.first_name" :value="__('First Name')" />
                <x-input-slim id="form.first_name" class="block w-full mt-1" type="text" wire:model="form.first_name" />
                <x-input-error for="form.first_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.last_name" :value="__('Last Name')" />
                <x-input-slim id="form.last_name" class="block w-full mt-1" type="text" wire:model="form.last_name" />
                <x-input-error for="form.last_name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.date_of_birth" :value="__('Date of Birth')" />
                <x-date-picker id="form.date_of_birth" class="block w-full mt-1" wire:model="form.date_of_birth" />
                <x-input-error for="form.date_of_birth" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.gender">Gender</x-label>
                <x-select id="form.gender" class="block w-full" wire:model="form.gender">
                    @foreach (\App\Enums\Gender::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.gender" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.marital_status">Marital Status</x-label>
                <x-select id="form.marital_status" class="block w-full" wire:model="form.marital_status">
                    @foreach (\App\Enums\MaritalStatus::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.marital_status" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.license_number" :value="__('License Number')" />
                <x-input-slim id="form.license_number" class="block w-full mt-1" type="text" wire:model="form.license_number" />
                <x-input-error for="form.license_number" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.license_state">License State</x-label>
                <x-select id="form.license_state" class="block w-full" wire:model="form.license_state">
                    @foreach (\App\Enums\LicenseState::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ Str::upper($value) }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.license_state" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.license_status">License Status</x-label>
                <x-select id="form.license_status" class="block w-full" wire:model="form.license_status">
                    @foreach (\App\Enums\LicenseStatus::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ Str::upper($value) }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.license_status" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.license_effective_date" :value="__('License Effective Date')" />
                <x-date-picker id="form.license_effective_date" class="block w-full mt-1" wire:model="form.license_effective_date" />
                <x-input-error for="form.license_effective_date" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.license_expiration_date" :value="__('License Expiration Date')" />
                <x-date-picker id="form.license_expiration_date" class="block w-full mt-1" wire:model="form.license_expiration_date" />
                <x-input-error for="form.license_expiration_date" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.license_class">License Class</x-label>
                <x-select id="form.license_class" class="block w-full" wire:model="form.license_class">
                    @foreach (\App\Enums\LicenseClass::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ Str::upper($value) }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.license_class" class="mt-2" />
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-button class="mr-4 bg-blue-500 hover:bg-white hover:text-black focus:bg-blue-500" wire:click="addDriver">
            {{ __('Save New Driver') }}
        </x-button>
        <x-button class="bg-blue-500 hover:bg-white hover:text-black" wire:click="$dispatch('add-driver-pop-up:show')">
            {{ __('Cancel') }}
        </x-button>
    </x-slot>
</x-dialog-modal>
