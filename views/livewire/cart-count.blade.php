<div class="h-full content-center flex items-center justify-center me-3">
    @if ($cartItems > 0)
        <a href="{{ route('checkout.index') }}" class="button bg-red-500 hover:bg-red-600 text-white !font-normal">
            <i class="ri-shopping-bag-line"></i>
            {{ $cartItems }}
        </a>
    @endif
</div>
