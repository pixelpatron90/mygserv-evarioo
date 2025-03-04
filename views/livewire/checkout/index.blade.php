<div>
    @empty(!$this->products)
        <div class="grid grid-cols-12 gap-4">

            <div class="col-span-12">
                <div class="content-box">
                    @if (empty($coupon))
                        <div class="flex flex-row items-start gap-x-2 place-content-stretch">
                            <div class="flex flex-col w-full">
                                <x-input type="text" placeholder="{{ __('Coupon') }}" name="couponCode"
                                    wire:model="couponCode" icon="ri-coupon-2-line" class="w-full" />
                            </div>
                            <button class="button bg-green-500 hover:bg-green-600 text-white" wire:click="validateCoupon">
                                {{ __('Validate') }}
                            </button>
                        </div>
                    @else
                        <div class="flex items-center justify-between">
                            <div>
                                {{ __('Coupon:') }}
                                <span class="text-secondary-900 font-semibold">{{ $coupon->code }}</span>
                            </div>
                            <button class="button bg-red-500 hover:bg-red-600 text-white" wire:click="removeCoupon">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    @endif
                    <hr class="my-4 border-secondary-300">
                    @foreach ($this->products as $product)
                        @if ($product->price > 0)
                            <span class=" -mb-3">
                                {{ ucfirst($product->name) }}
                            </span>
                            <div class="flex flex-row items-center justify-between -mt-1 text-gray-500 text-sm">
                                <div class="flex flex-row items-center">
                                    <span>
                                        {{ ucfirst($product->billing_cycle ?? 'One time') }}
                                    </span>
                                </div>
                                <div class="flex flex-col">
                                    <span>
                                        @php
                                            if ($product->quantity > 1) {
                                                $quantity = $product->quantity . ' x';
                                            } else {
                                                $quantity = '';
                                            }
                                        @endphp
                                        @if ($product->discount)
                                            {{ $quantity }}
                                            <x-money :amount="round($product->price - $product->discount, 2)" />
                                        @else
                                            {{ $quantity }}
                                            <x-money :amount="$product->price" />
                                        @endif
                                    </span>
                                </div>
                            </div>
                        @endif
                        @if ($product->setup_fee > 0)
                            <div class="flex flex-row items-center justify-between text-gray-200 text-sm">
                                <div class="flex flex-row items-center">
                                    {{ __('Setup fee') }}
                                </div>
                                <div class="flex flex-col">
                                    {{ $quantity }}
                                    <x-money :amount="$product->setup_fee - $product->discount_fee" />
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if (!empty($discount))
                        <div class="flex flex-row items-center justify-between mt-3">
                            <div class="flex flex-row items-center">
                                <span>{{ __('Discount') }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span>{{ config('settings::currency_sign') }}
                                    {{ round($discount, 2) }}
                                    @if ($coupon->type == 'percent')
                                        ({{ $coupon->value }}%)
                                    @endif
                                </span>
                            </div>
                        </div>
                    @endif
                    <hr class="my-4 border-secondary-200">
                    @if($tax->amount > 0)
                        <div class="flex flex-row items-center justify-between mt-2">
                            <div class="flex flex-row items-center">
                                Subtotal
                            </div>
                            <div class="flex flex-col items-end">
                                <x-money :amount="number_format($total-$tax->amount, 2)" />
                            </div>
                        </div>
                        <div class="flex flex-row items-center justify-between mt-2">
                            <div class="flex flex-row items-center">
                                {{ $tax->name }} ({{ $tax->rate }}%)
                            </div>
                            <div class="flex flex-col items-end">
                                <x-money :amount="$tax->amount" />
                            </div>
                        </div>
                    @endif
                    <div class="flex flex-row items-center justify-between mt-2">
                        <div class="flex flex-row items-center">
                            <span class="text-lg text-secondary-200 font-bold">{{ __('Total Today') }}</span>
                        </div>
                        <div class="flex flex-col items-end">
                            <span class="text-lg text-secondary-200 font-bold">
                                @if (!empty($discount))
                                    <x-money :amount="$total - $discount" />
                                @else
                                    <x-money :amount="$total" />
                                @endif
                            </span>
                        </div>
                    </div>

                    <hr class="my-4 border-secondary-300">
                    <form wire:submit.prevent="pay">
                        <span class="text-secondary-200">{{ __('You can continue without paying') }}</span>
                        @if (config('settings::tos'))
                            <div class="items-center mt-3">
                                @php
                                $tos = "I agree to the <a href='" . route('tos') . "' class='text-red-500 hover:text-red-600'>terms of service</a>"; @endphp <x-input id="tos" type="checkbox" name="tos" required
                                    :label="$tos" wire:model="tos" />
                            </div>
                        @endif
                        <div class="flex justify-end mt-4">
                            <button class="button bg-green-500 hover:bg-green-600 text-white" type="submit">
                                <span wire:loading wire:target="pay">
                                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="#9095A0" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                                <span wire:loading.remove wire:target="pay">
                                    {{ __('Checkout') }}
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-span-12">
                <div class="content-box !p-0 overflow-hidden">
                    <h2 class="text-xl font-bold text-secondary-200 px-6 pt-5 pb-2">{{ __('Order overview') }}</h2>
                    <table class="w-full">
                        <thead class="border-b-2 border-secondary-200 text-secondary-200">
                            <tr>
                                <th scope="col" class="text-start pl-6 py-2 text-secondary-200 font-normal">
                                    {{ __('Product') }}
                                </th>
                                <th scope="col" class="text-start py-2 text-secondary-200 font-normal">
                                    {{ __('Quantity') }}
                                </th>
                                <th scope="col" class="text-center pr-6 py-2 text-secondary-200 font-normal">
                                    {{ __('Price') }}
                                </th>
                                <th scope="col" class="text-end pr-6 py-2 text-secondary-200 font-normal">
                                    {{ __('Remove') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($this->products as $key => $product)
                                <tr
                                    class="{{ $loop->last ? '' : 'border-b-2 border-secondary-200' }}">
                                    <td class="pl-6 py-3">
                                        <div class="flex">
                                            @if ($product->image !== 'null')
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                    class="w-8 h-8 md:w-12 md:h-12 my-auto rounded-md"
                                                    onerror="removeElement(this);">
                                            @endif
                                            <strong class="ml-3 text-secondary-200 my-auto">{{ ucfirst($product->name) }}</strong>
                                        </div>
                                        @error('product.' . $product->id)
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td class="py-3 text-secondary-200">
                                        @if ($product->allow_quantity == 1 || $product->allow_quantity == 2)
                                            <input type="number" name="quantity"
                                                wire:change="updateQuantity({{ $product->id }}, $event.target.value)"
                                                wire:model="quantity" value="{{ $product->quantity }}"
                                                class="w-16 border border-secondary-200 rounded-md px-2 py-1 text-sm text-center"
                                                min="1" max="100" />
                                        @else
                                            {{ $product->quantity }}
                                        @endif
                                    </td>
                                    <td class="py-3 text-center text-secondary-200">
                                        @if ($product->discount)
                                            <span class="text-red-500 line-through"><x-money :amount="$product->price" /></span>
                                            <x-money :amount="round($product->price - $product->discount, 2)" />
                                        @else
                                            <x-money :amount="$product->price" :showFree="true" />
                                        @endif
                                        @if ($product->quantity > 1 && $product->price > 0)
                                            {{ __('each') }}
                                        @endif
                                    </td>
                                    <td class="py-3 pr-6 text-right" wire:click="removeProduct({{ $key }})">
                                        <button class="button bg-red-500 hover:bg-red-600 text-white">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    @else
        <div class="bg-red-500 rounded-md text-white p-4 w-full">
            {{ __('There are no products in your cart') }}
        </div>
    @endempty
</div>
