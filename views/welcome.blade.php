<x-app-layout title="home">
    <x-success class="mt-4" />

    @if ($categories->count() > 0)
    <div class="content">
        <div class="grid grid-cols-12 gap-4">
            @foreach ($categories as $category)
            @if (($category->products()->where('hidden', false)->count() > 0 && !$category->category_id) ||
            $category->children()->count() > 0)
            <div class="sm:col-span-6 col-span-12">
                <div class="content-box h-full flex flex-col">
                    <div class="flex gap-x-3 items-center mb-2">
                        @if($category->image)
                        <img src="/storage/categories/{{ $category->image }}" class="w-14 h-full rounded-md"
                            onerror="removeElement(this);" />
                        @endif
                        <div>
                            <h3 class="font-semibold text-secondary-200 text-lg">{{ $category->name }}</h3>
                        </div>
                    </div>
                    <div>@markdownify($category->description)</div>
                    <div class="pt-3 mt-auto">
                        <a href="{{ route('products', $category->slug) }}" class="button button-secondary w-full">{{
                            __('Browse Category') }}</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    @endif

    @if ($announcements->count() > 0)
    <div class="content">
        <h2 class="font-semibold text-2xl mb-2 mt-2 text-secondary-900">{{ __('Announcements') }}</h2>
        <div class="grid grid-cols-12 gap-4">
            @foreach ($announcements->sortByDesc('created_at') as $announcement)
            <div class="col-span-12">
                <div class="content-box">
                    <h3 class="font-semibold text-red-500 text-lg mb-3">{{ $announcement->title }}</h3>
                    <div class="w-full text-secondary-400">
                        @markdownify(substr($announcement->announcement, 0, 400) . '...')
                    </div>
                    <div class="flex lg:flex-col flex-row justify-between items-center mt-3">
                        <span class="text-sm text-secondary-400">{{ __('Published') }}
                            {{ $announcement->created_at->diffForHumans() }}</span>
                            <a href="{{ route('announcements.view', $announcement->id) }}"
                                class="button button-secondary">{{ __('Read More') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</x-app-layout>