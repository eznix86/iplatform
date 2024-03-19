<x-dialog-modal wire:model.live="showModal">
    <x-slot name="title">
        {{ __('Add Coverage') }}
    </x-slot>
    <x-slot name="content">
        <div class="grid grid-cols-6 gap-6">

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.type" :value="__('Coverage Type')" />
                <x-select id="form.type" class="block w-full mt-1" wire:model="form.type">
                    @foreach (\App\Enums\CoverageType::asSelectArray() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </x-select>
                <x-input-error for="form.type" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.limit" :value="__('Coverage Limit')" />
                <x-input-slim id="form.limit" class="block w-full mt-1" type="text" wire:model="form.limit" />
                <x-input-error for="form.limit" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-label for="form.deductible" :value="__('Coverage Deductible')" />
                <x-input-slim id="form.deductible" class="block w-full mt-1" type="text" wire:model="form.deductible" />
                <x-input-error for="form.deductible" class="mt-2" />
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-button class="mr-4 bg-blue-500 hover:bg-white hover:text-black focus:bg-blue-500" wire:click="addCoverage">
            {{ __('Save New Coverage') }}
        </x-button>
        <x-button class="bg-blue-500 hover:bg-white hover:text-black" wire:click="showModal = false">
            {{ __('Cancel') }}
        </x-button>
    </x-slot>
</x-dialog-modal>
