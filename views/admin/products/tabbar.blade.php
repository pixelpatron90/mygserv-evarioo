<div class="mb-4">
    <ul>
        <li>
            <a href="{{ route('admin.products.edit', $product->id) }}"
                class="inline-flex justify-center w-full p-4 px-2 py-2 text-xs font-bold uppercase border-b-2 dark:text-darkmodetext dark:hover:bg-darkbutton border-logo text-logo">
                {{ __('Details') }}
            </a>
        </li>

        <li>
            <a href="{{ route('admin.products.pricing', $product->id) }}"
                class="inline-flex justify-center w-full p-4 px-2 py-2 text-xs font-bold text-gray-900 uppercase border-b-2 dark:text-darkmodetext dark:hover:bg-darkbutton border-y-transparent hover:border-logo hover:text-logo">
                {{ __('Pricing') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.extension', $product->id) }}"
                class="inline-flex justify-center w-full p-4 px-2 py-2 text-xs font-bold text-gray-900 uppercase border-b-2 dark:text-darkmodetext dark:hover:bg-darkbutton border-y-transparent hover:border-logo hover:text-logo">
                {{ __('Extension') }}
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.upgrade', $product->id) }}"
                class="inline-flex justify-center w-full p-4 px-2 py-2 text-xs font-bold text-gray-900 uppercase border-b-2 dark:text-darkmodetext dark:hover:bg-darkbutton border-y-transparent hover:border-logo hover:text-logo">
                {{ __('Upgrades') }}
            </a>
        </li>
    </ul>
</div>