<div class="col-span-4 lg:col-span-2">
    <div class="content-box !px-2.5 !py-1.5 h-full flex flex-col">
        <div class="flex gap-x-3 items-center mb-2">
            @if ($product->image !== 'null')
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-14 rounded-md"
                    onerror="removeElement(this);">
            @endif
            <div>
                <h3 class="text-lg text-secondary-200 leading-5 font-semibold">
                    {{ $product->name }}</h3>
                <p class="!text-secondary-200">
                    <x-money :amount="$product->price()" showFree="true" />
                </p>
            </div>
        </div>
        <div class="markdownify-h2 w-full text-secondary-400">
            @markdownify($product->description)
        </div>
        <div class="pt-3 mt-auto">
            @if ($product->stock_enabled && $product->stock <= 0)
                <a class="button bg-red-500 text-white w-full hover:cursor-not-allowed">
                    {{ __('Out of stock!') }}
                </a>
            @else
                <button class="button button-secondary w-full @if ($added) !text-green-400 @endif"
                    wire:click="addToCart">
                    @if ($added)
                        <i class="fa-solid fa-cart-plus me-2"></i>
                        <span class="lg:inline-block hidden">{{ __('Added to cart') }}</span>
                    @else
                        <i class="fa-solid fa-cart-shopping me-2"></i>
                        <span class="lg:inline-block hidden">{{ __('Added to cart') }}</span>
                    @endif
                </button>
            @endif
        </div>
    </div>
</div>
