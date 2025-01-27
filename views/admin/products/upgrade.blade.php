<x-admin-layout title="Upgrades">
    @include('admin.products.tabbar', ['tab' => 'upgrade'])
    <form action="{{ route('admin.products.upgrade.update', $product->id) }}" method="POST">
        @csrf
        <div>
            <h1 class="font-semibold text-2xl text-gray-900 dark:text-darkmodetext">
                {{ __('Upgrades') }}
            </h1>

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

</x-admin-layout>