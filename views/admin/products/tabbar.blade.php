<div class="mb-4">
    <ul class="flex flex-row text-white text-sm">
        <li>
            <a href="{{ route('admin.products.edit', $product->id) }}"
                class="inline-flex justify-center hover:bg-red-500 w-full p-4 px-2 py-2 font-bold uppercase border-b-2 hover:border-red-500 hover:text-red-500">
                {{ __('Details') }}
            </a>
        </li>

        <li>
            <a href="{{ route('admin.products.pricing', $product->id) }}"
                class="inline-flex justify-center w-full p-4 px-2 py-2 font-bold uppercase border-b-2 border-y-transparent hover:border-red-500 hover:text-red-500">
                {{ __('Pricing') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.extension', $product->id) }}"
                class="inline-flex justify-center w-full p-4 px-2 py-2 font-bold uppercase border-b-2 border-y-transparent hover:border-red-500 hover:text-red-500">
                {{ __('Extension') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.upgrade', $product->id) }}"
                class="inline-flex justify-center w-full p-4 px-2 py-2 font-bold uppercase border-b-2 border-y-transparent hover:border-red-500 hover:text-red-500">
                {{ __('Upgrades') }}
            </a>
        </li>
    </ul>
</div>