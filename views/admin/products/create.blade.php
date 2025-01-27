<x-admin-layout :title="__('Create ')">
    <div class="text-2xl text-secondary-300 mt-4 mb-4">
        {{ __('Create Product') }}
    </div>
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <x-input type="text" name="name" label="{{ __('Name') }}" placeholder="{{ __('Name') }}"
                value="{{ old('name') }}" required autofocus />
        </div>
        <div class="mb-4">
            <x-input type="textarea" name="description" label="{{ __('Description') }}"
                placeholder="{{ __('Description') }}" value="{{ old('description') }}" required rows="4" class="mt-2" />
        </div>
        <div class="mb-4">
            <x-input type="text" name="price" label="{{ __('Price') }}" placeholder="{{ __('Price') }}"
                value="{{ old('price') }}" required />
        </div>
        <div class="mb-4">
            <div class="mt-4">
                <label for="image">{{ __('Image') }}</label>

                <input id="image" class="block w-full mt-1 rounded-lg dark:bg-darkmode" type="file" name="image"
                    required />
                <div class="mt-2">
                    <label for="no_image">No Image</label>
                    <input type="checkbox" name="no_image" id="no_image" value="1" {{ old('no_image') ? 'checked' : ''
                        }} class="form-input w-4 h-4">

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
        </div>
        <div class="flex items-center justify-start">
            <button type="submit" class="form-submit">
                {{ __('Create') }}
            </button>
        </div>
    </form>
</x-admin-layout>