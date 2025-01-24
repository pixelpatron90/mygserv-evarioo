<x-admin-layout title="Taxes">
    <div class="p-3 site-header">
        <div>
            <div class="text-secondary-200 text-2xl font-bold">
                <i class="fa-solid fa-caret-right"></i> {{ __('Taxes') }}
            </div>
        </div>
    </div>

    <form action="{{ route('admin.taxes.update') }}" method="POST">
        @csrf
        <div class="flex flex-col space-y-4">
            <input type="hidden" name="tax_enabled" value="0" />
            <x-input name="tax_enabled" type="checkbox" value="1" label="Enable Tax" :checked="config('settings::tax_enabled') == 1" />
            <x-input name="tax_type" type="select" :value="old('tax_type', config('settings::tax_type'))" label="Tax Type">
                <option value="inclusive" @if (config('settings::tax_type') == 'inclusive') selected @endif>Inclusive (product price includes tax)</option>
                <option value="exclusive" @if (config('settings::tax_type') == 'exclusive') selected @endif>Exclusive (product price excludes tax)</option>
            </x-input>
            <h4 class="text-xl secondary-200 font-bold">{{ __('Tax Rates') }}</h4>
            @foreach ($taxrates as $key => $taxrate)
                <input type="hidden" name="taxrates[{{ $key }}][id]" value="{{ $taxrate->id }}" />
                <div class="flex flex-row gap-4">
                    <x-input name="taxrates[{{ $key }}][name]" :value="old('taxrates.'.$taxrate->id.'.name', $taxrate->name) ?? $taxrate->name" label="Name" type="text" class="w-full" />
                    <x-input name="taxrates[{{ $key }}][rate]" :value="old('taxrates.'.$taxrate->id.'.rate', $taxrate->rate) ?? $taxrate->rate" label="Rate" type="text" class="w-full" />
                    <x-input name="taxrates[{{ $key }}][country]" :value="old('taxrates.'.$taxrate->id.'.country', $taxrate->country) ?? $taxrate->country" label="Country" type="select" class="w-full">
                        @foreach ($countries as $key2 => $country)
                            <option value="{{ $key2 }}" @if ($taxrate->country == $key2) selected @endif>{{ $country }}</option>
                        @endforeach
                    </x-input>
                    <x-input name="taxrates[{{ $key }}][delete]" label="Delete" type="checkbox" value="1" class="w-fit mt-6" />
                </div>
            @endforeach
            <button class="button button-primary w-fit mt-4 mb-4">{{ __('Save') }}</button>
        </div>
    </form>

    <div class="p-3 site-header mt-4">
        <div>
            <div class="text-secondary-200 text-2xl font-bold">
                <i class="fa-solid fa-caret-right"></i> {{ __('Create taxes') }}
            </div>
        </div>
    </div>

    <form action="{{ route('admin.taxes.create') }}" method="POST" class="mt-4">
        @csrf
        <div class="flex flex-row gap-4">
            <x-input name="name" label="Name" type="text" class="w-full" />
            <x-input name="rate" label="Rate" type="text" class="w-full" />
            <x-input name="country" label="Country" type="select" class="w-full">
                @foreach ($countries as $key => $country)
                    <option value="{{ $key }}">{{ $country }}</option>
                @endforeach
            </x-input>
        </div>
        <button class="button button-primary mt-4">{{ __('Create') }}</button>
    </form>

</x-admin-layout>