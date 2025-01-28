<x-app-layout title="{{ $announcement->title }}" description='{{ strip_tags(Str::markdown(nl2br(Stevebauman\Purify\Facades\Purify::clean($announcement->announcement)))) }}'>
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
        <ul class="content-box mb-4 flex flex-row">
            <li class="me-3 text-secondary-200 flex items-center content-center gap-x-2">
                <i class="fa-regular fa-calendar text-red-500"></i>
                {{ $announcement->created_at->format('d/m/Y') }}
            </li>
            <li class="text-secondary-200 flex items-center content-center gap-x-2">
                <i class="fa-solid fa-clock text-red-500"></i>
                {{ $announcement->created_at->format('H:i') }}
            </li>
        </ul>
        <div class="content-box">
            @markdownify($announcement->announcement)
        </div>
    </div>
</x-app-layout>
