<nav class="flex flex-row justify-between">
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-sm lg:hidden hover:bg-gray-100" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="mt-1 lg:mt-0 hidden lg:block h-full" id="navbar-default">
      <ul>
        <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
        @foreach (App\Models\Category::whereNull('category_id')->orderBy('order')->get() as $category)
        @if ($category->products()->where('hidden', false)->count() > 0 || $category->children->count() > 0)
        <li><a href="{{ route('products', $category->slug) }}">{{ $category->name }}</a></li>
        @endif
        @endforeach
        <li><a href="{{ route('announcements.index') }}">{{ __('Announcements') }}</a></li>
        <li><a href="{{ route('media.index') }}">{{ __('Media') }}</a></li>
        <li><a href="{{ route('legalnotice.index') }}">{{ __('Legal notice') }}</a></li>
    </ul>
    </div>
    <livewire:cart-count />
</nav>