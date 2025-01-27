<div class="mb-4">
    <ul class="flex flex-row text-white text-sm border-b-4 border-red-500">
        <li>
            <a href="{{ route('admin.products.edit', $product->id) }}"
                class="@if ($tab == 'edit') text-red-500 @endif inline-flex justify-center hover:bg-red-500 hover:text-white rounded-t-md w-full px-2.5 py-3.5 font-bold uppercase">
                {{ __('Details') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.pricing', $product->id) }}"
                class="@if ($tab == 'pricing') text-red-500 @endif inline-flex justify-center hover:bg-red-500 hover:text-white rounded-t-md w-full px-2.5 py-3.5 font-bold uppercase">
                {{ __('Pricing') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.extension', $product->id) }}"
                class="inline-flex justify-center hover:bg-red-500 hover:text-white rounded-t-md w-full px-2.5 py-3.5 font-bold uppercase">
                {{ __('Extension') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.upgrade', $product->id) }}"
                class="inline-flex justify-center hover:bg-red-500 hover:text-white rounded-t-md w-full px-2.5 py-3.5 font-bold uppercase">
                {{ __('Upgrades') }}
            </a>
        </li>
    </ul>
</div>