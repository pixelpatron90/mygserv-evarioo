<x-admin-layout :title="__('Editing ') . $product->name">
    @include('admin.products.tabbar', ['tab' => 'pricing'])
    <div class="text-2xl text-secondary-300 mt-4 mb-4">
        {{ __('Update product pricing') }} {{ $product->name }}
    </div>
    <form action="{{ route('admin.products.pricing.update', $product->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <x-input type="select" name="pricing" id="pricing" label="{{ __('Pricing') }}"
                placeholder="{{ __('Pricing') }}">
                <option value="free" @if ($pricing->type == 'free') selected @endif>
                    {{ __('Free') }}
                </option>
                <option value="one-time" @if ($pricing->type == 'one-time') selected @endif>
                    {{ __('One-time') }}
                </option>
                <option value="recurring" @if ($pricing->type == 'recurring') selected @endif>
                    {{ __('Recurring') }}
                </option>
            </x-input>
        </div>
        <div class="mb-4">
            <x-input type="select" name="allow_quantity" id="allow_quantity"
                label="{{ __('Allow multiple quantities') }}" placeholder="{{ __('Allow multiple quantities') }}">
                <option value="0" @if ($product->allow_quantity == 0) selected @endif>
                    {{ __('No') }}
                </option>
                <option value="1" @if ($product->allow_quantity == 1) selected @endif>
                    {{ __('Yes, Multiple Services (Each represents a own individual service instance)')
                    }}
                </option>
                <option value="2" @if ($product->allow_quantity == 2) selected @endif>
                    {{ __('Yes, Single Service (One service instance with multiple quantity)') }}
                </option>
            </x-input>
        </div>
        <div class="mb-4">
            <x-input type="number" name="limit" id="limit" label="{{ __('Limit per client') }}"
                placeholder="{{ __('Limit per client') }}" value="{{ $product->limit }}}" />
        </div>
        <div class="flex items-center justify-start">
            <button type="submit" class="inline-flex justify-center w-max float-right button button-primary">
                {{ __('Save') }}
            </button>
        </div>
    </form>
</x-admin-layout>