<div class="h-full content-center flex items-center justify-center me-1">
    @if ($cartItems > 0)
        <a href="{{ route('checkout.index') }}" class="button bg-red-500 hover:bg-red-600 text-white !font-normal">
            <i class="fa-solid fa-cart-shopping"></i>
            {{ $cartItems }}
        </a>
    @endif
</div>
