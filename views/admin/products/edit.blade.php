<x-admin-layout>
    <x-slot name="title">
        {{ __('Products') }}
    </x-slot>
    @include('admin.products.tabbar')
    <div class="grid grid-cols-1 md:grid-cols-2 mt-4 mb-4">
        <div class="text-2xl dark:text-darkmodetext">
            {{ __('Update product') }} {{ $product->name }}
        </div>
        <div class="relative inline-block text-left justify-end">
            <button type="button"
                class="absolute top-0 right-0 inline-flex w-max justify-end bg-red-500 hover:bg-red-600 px-2 py-2 text-base font-medium rounded-md text-white"
                id="menu-button" aria-expanded="true" aria-haspopup="true" data-dropdown-toggle="moreOptions">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <div class="absolute hidden w-max origin-top-right bg-primarycolor rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-20"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                id="moreOptions">
                <div class="py-1 grid grid-cols-1" role="none">
                    <button
                        class="block px-4 py-2 text-base text-gray-200 hover:bg-gray-800"
                        role="menuitem" tabindex="-1" id="menu-item-0"
                        onclick="document.getElementById('duplicate').submit()">
                        {{ __('Duplicate') }}
                    </button>
                    <button
                        class="block px-4 py-2 text-base text-gray-200 hover:bg-gray-800 hover:text-red-600"
                        role="menuitem" tabindex="-1" id="menu-item-0"
                        onclick="document.getElementById('delete').submit()">
                        {{ __('Delete') }}
                    </button>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" id="delete">
                @csrf
                @method('DELETE')
            </form>
            <form method="POST" action="{{ route('admin.products.duplicate', $product->id) }}" id="duplicate">
                @csrf
            </form>
        </div>
    </div>
    <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
            <x-input type="text" name="name" label="{{ __('Name') }}" placeholder="{{ __('Name') }}"
                value="{{ $product->name }}" required autofocus />
            </div>

            <div class="mb-4">
            <x-input type="checkbox" label="{{ __('Hidden') }}" name="hidden" id="hidden" value="1" class="mt-2"
                :checked="$product->hidden ? true : false" />
            </div>
            
            <div class="mb-4">
            <x-input type="textarea" name="description" label="{{ __('Description') }}"
                placeholder="{{ __('Description') }}" value="{{ $product->description }}" required rows="4" />
            </div>

            <div class="mb-4">
            <x-input type="checkbox" label="{{ __('Stock enabled') }}" name="stock_enabled" id="stock_enabled"
                value="1"
                onchange="if(this.checked) { document.getElementById('stock').classList.remove('hidden'); } else { document.getElementById('stock').classList.add('hidden'); }"
                :checked="$product->stock_enabled ? true : false" />

            <div class="@if (!$product->stock_enabled) hidden @endif" id="stock">
                <x-input type="number" name="stock" label="{{ __('Stock') }}" placeholder="{{ __('Stock') }}"
                    value="{{ $product->stock }}" required min="0" />
            </div>
            </div>
        <div class="mb-4">
            <div class="mt-4">
                <label for="image">{{ __('Image') }}</label>
                <p>Only upload a new image if you want to replace the existing one</p>
                <input id="image" class="block w-full mt-1 rounded-lg dark:bg-darkmode" type="file"
                    name="image" @if ($product->image == 'null') disabled @endif />
                <div class="mt-2">
                    <label for="no_image">No Image</label>
                    <input type="checkbox" name="no_image" id="no_image" value="1" class="form-input w-4 h-4"
                        @if ($product->image == 'null') checked @endif>
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-32 h-32 mt-4" id="prodctimg"
                        onerror="removeElement(this)">
                    <script>
                        function removeElement(element) {
                            element.onerror = "";
                        }
                        document.getElementById('no_image').addEventListener('change', function() {
                            document.getElementById('image').disabled = this.checked;
                            document.getElementById('prodctimg').classList.toggle('hidden');
                        });
                        // Listen for file uploads then display the image
                        document.getElementById('image').addEventListener('change', function() {
                            if (this.files && this.files[0]) {
                                var img = document.getElementById('prodctimg');
                                img.classList.remove('hidden');
                                img.src = URL.createObjectURL(this.files[0]);
                            }
                        });
                        if (document.getElementById('no_image').checked) {
                            document.getElementById('image').disabled = true;
                            document.getElementById('prodctimg').classList.add('hidden');
                        }
                    </script>
                </div>
            </div>
            <x-input type="select" name="category_id" label="{{ __('Category') }}">
                @if ($categories->count())
                    @foreach ($categories as $category)
                        @if ($category->id == $product->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}
                            </option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                @else
                    <option value="">No categories found</option>
                @endif
            </x-input>
            <div class="flex items-center justify-end mt-4 text-blue-700">
                <a href="{{ route('admin.categories.create') }}">Create Category</a>
            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex justify-center w-max float-right button button-primary">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
</x-admin-layout>
