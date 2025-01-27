<x-admin-layout title="Products">
    <div class="p-3 site-header">
        <div>
            <div class="text-secondary-200 text-2xl font-bold">
                <i class="fa-solid fa-caret-right"></i> {{ __('Products') }}
            </div>
            <p class="text-secondary-200">
                {{ __('Here you can see all products.') }}
            </p>
        </div>
        <div class="flex my-auto float-end justify-end mr-4">
            <a href="{{ route('admin.products.create') }}"
                class="px-4 py-2 font-bold !text-white transition rounded delay-400 button button-primary">
                <i class="fa-solid !text-white fa-plus me-2"></i> {{ __('Create') }}
            </a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    @if ($categories->isEmpty())
    <div class="ml-10 flex items-baseline ">
        <p class="text-gray-600 px-3 rounded-md text-xl m-4">
            {{ __('No products found') }}

        </p>
        <button class="button button-primary">
            <a href="{{ route('admin.categories.create') }}">
                {{ __('Create category') }}
            </a>
        </button>
    </div>
    @else
    <div id="categories">
        @foreach ($categories as $category)
        <h1 class="text-center text-secondary-200 text-2xl font-bold mb-2 mt-2">{{ $category->name }}</h1>
        <livewire:admin.products :category="$category" :key="$category->id" :tableName="$category->name" />
        @endforeach
    </div>
    @endif

</x-admin-layout>