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
                            <img src="/storage/categories/{{ $category->image }}" class="w-20 h-full rounded-md mr-4" />
                        @endif
                        <div class="w-full">
                            <h1 class="text-3xl font-semibold text-secondary-900">{{ $category->name }}</h1>
                            <div class="prose dark:prose-invert">
                                @markdownify($category->description)
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4 mt-4">
                    @foreach($category->children as $childCat)
                        <div class="lg:col-span-4 md:col-span-6 col-span-12">
                            <div class="content-box h-full flex flex-col">
                                <div class="flex items-center gap-x-3 mb-2">
                                    @if($childCat->image)
                                        <img src="/storage/categories/{{ $childCat->image }}" class="w-14 rounded-md" onerror="removeElement(this);" />
                                    @endif
                                    <div>
                                        <h3 class="font-semibold text-lg">{{ $childCat->name }}</h3>
                                    </div>
                                </div>
                                <div class="prose dark:prose-invert">@markdownify($childCat->description)</div>
                                <div class="pt-3 mt-auto">
                                    <a href="{{ route('products', $childCat->slug) }}"
                                    class="button button-secondary w-full">{{ __('Browse Category') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="grid grid-cols-3 gap-4 mt-4">
                    @foreach ($category->products()->where('hidden', false)->with('prices')->orderBy('order')->get() as $product)
                        <livewire:product :product="$product" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
