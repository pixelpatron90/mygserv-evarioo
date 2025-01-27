<x-admin-layout :title="__('Editing ') . $product->name">
    @include('admin.products.tabbar', ['tab' => 'upgrade'])
    <div class="grid grid-cols-1 md:grid-cols-2 mt-4 mb-4">
        <div class="text-2xl text-secondary-300">
            {{ __('Update product upgrade') }} {{ $product->name }}
        </div>
        <form action="{{ route('admin.products.upgrade.update', $product->id) }}" method="POST">
            @csrf
            <div>
                <x-input type="select" multiple name="upgrades[]" class="mt-2">
                    @foreach ($products as $product2)
                    <option value="{{ $product2->id }}" @if ($product->upgrades()->where('upgrade_product_id',
                        $product2->id)->exists()) selected @endif>{{ $product2->name }}</option>
                    @endforeach
                </x-input>

                <div class="hidden tobereleased">
                    <x-input class="mt-2" type="checkbox" value="1" name="upgrade_configurable_options"
                        label="{{ __('Allow upgrade of configurable options') }}"
                        :checked="$product->upgrade_configurable_options ? true : false" />
                </div>

                <button class="button button-primary mt-4">{{ __('Save') }}</button>
            </div>
        </form>
    </div>

</x-admin-layout>