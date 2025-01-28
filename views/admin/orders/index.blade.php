<x-admin-layout>
    <x-slot name="title">
        {{ __('Orders') }}
    </x-slot>

    <div class="site-header">
        <div class="title">
            <div class="text-2xl font-bold text-secondary-200">
                <i class="fa-solid fa-caret-right"></i> {{ __('Orders') }}
            </div>
            <p>
                {{ __('Here you can see all orders.') }}
            </p>
        </div>
    </div>

    <livewire:admin.orders />
</x-admin-layout>
