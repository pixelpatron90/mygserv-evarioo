<x-app-layout description="{{ $category->description ?? null }}" title="{{ $category->name ?? __('Products') }}">
    <x-success />
    <script>
        function removeElement(element) {
            element.remove();
            this.error = true;
        }
    </script>
    <div class="content">
        <div class="grid grid-cols-12 gap-4">
            <div class="@if ($categories->count() > 0) lg:col-span-12 @endif col-span-12">
                <div class="content-box">
                    <div class="flex flex-row">
                        @if($category->image)
                        <img src="/storage/categories/{{ $category->image }}"
                            class="w-16 h-full lg:block hidden rounded-md mr-4" />
                        @endif
                        <div class="w-full">
                            <h1 class="text-3xl font-semibold text-red-500">{{ $category->name }}</h1>
                            <div class="w-full text-secondary-400">
                                @markdownify($category->description)
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-4 mt-4">
                    @foreach ($category->products()->where('hidden', false)->with('prices')->orderBy('order')->get() as $product)
                    <livewire:product :product="$product" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>