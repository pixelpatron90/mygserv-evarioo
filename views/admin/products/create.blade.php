<x-admin-layout>
    <x-slot name="title">
        {{ __('Products') }}
    </x-slot>

    <div class="p-3 site-header">
        <div>
            <div class="text-2xl font-bold text-secondary-200">
                <i class="fa-solid fa-caret-right"></i> {{ __('Create Product') }}
            </div>
        </div>
    </div>

    <div class="mt-6 text-gray-500">
        <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf
            <x-input type="text" name="name" label="{{ __('Name') }}" placeholder="{{ __('Name') }}"
                value="{{ old('name') }}" required autofocus />

            <x-input type="textarea" name="description" label="{{ __('Description') }}"
                placeholder="{{ __('Description') }}" value="{{ old('description') }}" required rows="4" class="mt-2" />

            <x-input type="text" name="price" label="{{ __('Price') }}" placeholder="{{ __('Price') }}"
                value="{{ old('price') }}" required />
            
            <div class="mt-4">
                <label for="image">{{ __('Image') }}</label>

                <input id="image" class="block w-full mt-1 rounded-lg dark:bg-darkmode" type="file"
                    name="image" required />
                <div class="mt-2">
                    <label for="no_image">No Image</label>
                    <input type="checkbox" name="no_image" id="no_image" value="1"
                        {{ old('no_image') ? 'checked' : '' }} class="form-input w-4 h-4">

                    <script>
                        document.getElementById('no_image').addEventListener('change', function() {
                            document.getElementById('image').disabled = this.checked;
                        });
                    </script>
                </div>
            </div>
            <div class="mt-4">
                <x-input type="select" name="category_id" label="{{ __('Category') }}">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </x-input>

                <div class="flex items-center justify-end mt-4 text-red-500 hover:text-red-600">
                    <a href="{{ route('admin.invoices.create') }}"
                        class="px-4 py-2 font-bold !text-white transition rounded delay-400 button button-primary">
                        <i class="fa-solid !text-white fa-plus me-2"></i> {{ __('Create categorie') }}
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="inline-flex justify-center w-max float-right button button-primary">
                    {{ __('Save') }}
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
