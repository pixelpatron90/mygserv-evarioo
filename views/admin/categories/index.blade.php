<x-admin-layout>
    <x-slot name="title">
        {{ __('Categories') }}
    </x-slot>
    <div class="p-3 site-header">
        <div>
            <div class="text-secondary-200 text-2xl font-bold">
                <i class="fa-solid fa-caret-right"></i> {{ __('Categories') }}
            </div>
            <p class="text-secondary-200">
                {{ __('Here you can see all categories.') }}
            </p>
        </div>
        <div class="flex my-auto float-end justify-end mr-4">
            <a href="{{ route('admin.categories.store') }}"
               class="px-4 py-2 font-bold !text-white transition rounded delay-400 button button-primary">
               <i class="fa-solid !text-white fa-plus me-2"></i> {{ __('Create') }}
            </a>
        </div>
    </div>
    <livewire:admin.categories />
</x-admin-layout>
