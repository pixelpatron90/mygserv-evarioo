<x-admin-layout>
    <x-slot name="title">
        {{ __('Orders') }}
    </x-slot>
    <h1 class="text-center text-secondary-200 text-2xl font-bold">{{ __('Orders') }}</h1>
    <div class="p-3 site-header">
        <div>
            <div class="text-2xl font-bold text-secondary-200">
                <i class="fa-solid fa-caret-right"></i> {{ __('Orders') }}
            </div>
            <p class="text-secondary-200">
                {{ __('Here you can see all orders.') }}
            </p>
        </div>
    </div>

    <livewire:admin.orders />
</x-admin-layout>
