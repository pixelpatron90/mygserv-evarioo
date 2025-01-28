<x-app-layout title="{{ __('Announcements') }}">
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
                        {{ __('Current and important things') }}
                    </div>
                </div>
            </div>
        </div>
        @if ($announcements->count() > 0)
            <div class="grid grid-cols-12 gap-4">
                @foreach ($announcements->sortByDesc('created_at') as $announcement)
                    <div class="col-span-12">
                        <div class="content-box">
                            <h3 class="font-semibold text-red-500 text-lg mb-3">{{ $announcement->title }}</h3>
                            <div class="w-full text-secondary-400">
                                @markdownify(substr($announcement->announcement, 0, 300) . '...')
                            </div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-sm text-secondary-400">{{ __('Published') }}
                                    {{ $announcement->created_at->diffForHumans() }}</span>
                                <a href="{{ route('announcements.view', $announcement->id) }}"
                                    class="button button-secondary">{{ __('Read More') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
            <p class="text-center py-3">{{ __('Announcement not found!') }}</p>
        @endif
    </div>
</x-app-layout>
