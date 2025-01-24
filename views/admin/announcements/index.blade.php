<x-admin-layout>
    <x-slot name="title">
        {{ __('Announcements') }}
    </x-slot>
    
    <div class="p-3 site-header">
        <div>
            <div class="text-secondary-200 text-2xl font-bold">
                <i class="fa-solid fa-caret-right"></i> {{ __('Announcements') }}
            </div>
            <p class="text-secondary-200">
                {{ __('Here you can see all categories.') }}
            </p>
        </div>
        <div class="flex my-auto float-end justify-end mr-4">
            <a href="{{ route('admin.announcements.store') }}"
               class="px-4 py-2 font-bold !text-white transition rounded delay-400 button button-primary">
               <i class="fa-solid !text-white fa-plus me-2"></i> {{ __('Create') }}
            </a>
        </div>
    </div>

    <livewire:admin.announcements />
</x-admin-layout>
