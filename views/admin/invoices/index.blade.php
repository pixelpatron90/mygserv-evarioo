<x-admin-layout>
    <x-slot name="title">
        {{ __('Invoices') }}
    </x-slot>

    <div class="site-header">
        <div class="title">
            <div class="text-2xl font-bold text-secondary-200">
                <i class="fa-solid fa-caret-right"></i> {{ __('Invoices') }}
            </div>
            <p>
                {{ __('Here you can see all invoices.') }}
            </p>
        </div>
        <div class="flex my-auto float-end justify-end mr-4">
            <a href="{{ route('admin.invoices.create') }}"
               class="px-4 py-2 font-bold !text-white transition rounded delay-400 button button-primary">
               <i class="fa-solid !text-white fa-plus me-2"></i> {{ __('Create') }}
            </a>
        </div>
    </div>
    <livewire:admin.invoices />
</x-admin-layout>
