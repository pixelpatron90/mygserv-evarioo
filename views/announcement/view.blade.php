<x-app-layout title="{{ $announcement->title }}" description='{{ strip_tags(Str::markdown(nl2br(Stevebauman\Purify\Facades\Purify::clean($announcement->announcement)))) }}'>
    
    <!-- View Announcement -->
    <div class="content">

        <div class="content-box mb-4">
            <div class="flex flex-row">
                @if(config('settings::app_logo'))
                    <img src="{{ asset(config('settings::app_logo')) }}"
                        class="w-16 h-full lg:block hidden rounded-md mr-4" />
                @endif
                <div class="w-full">
                    <h1 class="text-3xl font-semibold text-red-500">
                      {{ __('Announcements') }}
                    </h1>
                    <div class="w-full text-secondary-400">
                        {{ __('You are currently reading: :title', ['title' => $announcement->title]) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="content-box mb-4 flex justify-between">
            <p class="text-secondary-400 flex items-center gap-x-2">
                <i class="ri-calendar-line"></i>
                {{ $announcement->created_at->format('d/m/Y') }}
            </p>
            <p class="text-secondary-400 flex items-center gap-x-2">
                <i class="ri-time-line ml-1"></i>
                {{ $announcement->created_at->format('H:i') }}
            </p>
        </div>

        <div class="content-box">
            @markdownify($announcement->announcement)
        </div>
    </div>

</x-app-layout>
