<x-admin-layout :title="__('Editing ') . $product->name">
    @include('admin.products.tabbar', ['tab' => 'upgrade'])
    <div class="text-2xl text-secondary-300 mt-4 mb-4">
        {{ __('Update product upgrade') }} {{ $product->name }}
    </div>
    <form action="{{ route('admin.products.upgrade.update', $product->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <x-input type="select" multiple name="upgrades[]" class="mt-2">
                @foreach ($products as $product2)
                <option value="{{ $product2->id }}" @if ($product->upgrades()->where('upgrade_product_id',
                    $product2->id)->exists()) selected @endif>{{ $product2->name }}</option>
                @endforeach
            </x-input>
        </div>
        <div class="hidden mb-4 tobereleased">
            <x-input class="mt-2" type="checkbox" value="1" name="upgrade_configurable_options"
                label="{{ __('Allow upgrade of configurable options') }}"
                :checked="$product->upgrade_configurable_options ? true : false" />
        </div>
        <div class="flex items-center justify-start">
            <button type="submit" class="form-submit">
                {{ __('Update') }}
            </button>
        </div>
    </form>
</x-admin-layout>