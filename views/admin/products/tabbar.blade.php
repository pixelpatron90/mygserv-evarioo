<div class="mb-4">
    <ul class="flex flex-row text-white text-sm border-b-4 border-red-500">
        <li>
            <a href="{{ route('admin.products.edit', $product->id) }}"
                class="inline-flex justify-center hover:bg-red-500 hover:text-white w-full p-4 px-2 py-2 font-bold uppercase">
                {{ __('Details') }}
            </a>
        </li>

        <li>
            <a href="{{ route('admin.products.pricing', $product->id) }}"
                class="inline-flex justify-center hover:bg-red-500 hover:text-white w-full p-4 px-2 py-2 font-bold uppercase">
                {{ __('Pricing') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.extension', $product->id) }}"
                class="inline-flex justify-center hover:bg-red-500 hover:text-white w-full p-4 px-2 py-2 font-bold uppercase">
                {{ __('Extension') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.upgrade', $product->id) }}"
                class="inline-flex justify-center hover:bg-red-500 hover:text-white w-full p-4 px-2 py-2 font-bold uppercase">
                {{ __('Upgrades') }}
            </a>
        </li>
    </ul>
</div>