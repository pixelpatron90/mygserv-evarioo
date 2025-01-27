<div class="col-span-4 lg:col-span-2">
    <div class="product-card">
        <div class="product-card-header">
            <h3 class="text-lg text-secondary-200 leading-5 font-semibold">
                {{ $product->name }}
            </h3>
            <p class="!text-secondary-200">
                <x-money :amount="$product->price()" showFree="true" />
            </p>
        </div>
            @if ($product->image !== 'null')
            <div class="border-y-8 border-red-500">
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full"
                onerror="removeElement(this);">
            </div>
            @else
            <div class="py-4 text-center text-red-500 font-bold">
            {{ __('No product image selected.') }}
            </div>
            @endif
        <div class="product-card-footer">
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
