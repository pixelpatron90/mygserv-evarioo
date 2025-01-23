<nav class="lg:flex lg:flex-row lg:justify-between">
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-3.5 w-8 h-8 justify-center text-white rounded-sm lg:hidden bg-red-500 hover:bg-red-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="mt-2 lg:mt-0 hidden lg:block h-full" id="navbar-default">
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
    <div class="lg:block hidden">
        <livewire:cart-count />
    </div>
</nav>