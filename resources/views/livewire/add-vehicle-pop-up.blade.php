<x-dialog-modal wire:model.live="showModal">
    <x-slot name="title">
        {{ __('Add Vehicle') }}
    </x-slot>
    <x-slot name="content">

        <div class="grid grid-cols-6 gap-6">
            {{-- Year --}}
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.year" :value="__('Year')" />
                <x-input-slim id="form.year" class="block w-full mt-1" type="text" wire:model="form.year" />
                <x-input-error for="form.year" class="mt-2" />
            </div>
            {{-- Make --}}
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.make" :value="__('Make')" />
                <x-input-slim id="form.make" class="block w-full mt-1" type="text" wire:model="form.make" />
                <x-input-error for="form.make" class="mt-2" />
            </div>
            {{-- Model --}}
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.model" :value="__('Model')" />
                <x-input-slim id="form.model" class="block w-full mt-1" type="text" wire:model="form.model" />
                <x-input-error for="form.model" class="mt-2" />
            </div>
            {{-- Vin --}}
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.vin" :value="__('Vin')" />
                <x-input-slim id="form.vin" class="block w-full mt-1" type="text" wire:model="form.vin" />
                <x-input-error for="form.vin" class="mt-2" />
            </div>
            {{-- Usage --}}
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.usage">Usage</x-label>
                <x-select id="form.usage" class="block w-full" wire:model="form.usage">
                    @foreach (\App\Enums\UsageType::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.usage" class="mt-2" />
            </div>
            {{-- Primary Use --}}
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.primary_use">Primary Use</x-label>
                <x-select id="form.primary_use" class="block w-full" wire:model="form.primary_use">
                    @foreach (\App\Enums\PrimaryUse::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.primary_use" class="mt-2" />
            </div>
            {{-- Annual Mileage --}}
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.annual_mileage" :value="__('Annual Mileage')" />
                <x-input-slim type="text" id="form.annual_mileage" class="block w-full mt-1" wire:model="form.annual_mileage" />
                <x-input-error for="form.annual_mileage" class="mt-2" />
            </div>
            {{-- Ownership --}}

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.ownership">Ownership</x-label>
                <x-select id="form.ownership" class="block w-full" wire:model="form.ownership">
                    @foreach (\App\Enums\OwnershipType::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.ownership" class="mt-2" />
            </div>


            <h2 class="col-span-6 sm:col-span-6">Garaging Address</h2>

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.street" :value="__('Street')" />
                <x-input-slim id="form.street" class="block w-full mt-1" type="text" wire:model="form.street" />
                <x-input-error for="form.street" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.city" :value="__('City')" />
                <x-input-slim id="form.city" class="block w-full mt-1" type="text" wire:model="form.city" />
                <x-input-error for="form.city" class="mt-2" />

            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.state">State</x-label>
                <x-select id="form.state" class="block w-full" wire:model="form.state">
                    @foreach (\App\Enums\LicenseState::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ Str::upper($value) }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.state" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.zip" :value="__('Zip')" />
                <x-input-slim id="form.zip" class="block w-full mt-1" type="text" wire:model="form.zip" />
                <x-input-error for="form.zip" class="mt-2" />
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-button class="mr-4 bg-blue-500 hover:bg-white hover:text-black focus:bg-blue-500" wire:click="addVehicle">
            {{ __('Save New Vehicle') }}
        </x-button>
        <x-button class="bg-blue-500 hover:bg-white hover:text-black" wire:click="$dispatch('add-vehicle-pop-up:show')">
            {{ __('Cancel') }}
        </x-button>
    </x-slot>
</x-dialog-modal>
