<x-admin-layout :title="__('Editing ') . $product->name">
    @include('admin.products.tabbar', ['tab' => 'extension'])
    <div class="grid grid-cols-1 md:grid-cols-2 mt-4">
        <div class="text-2xl dark:text-darkmodetext">
            {{ __('Update product server') }}: {{ $product->name }}
        </div>
        <div class="relative inline-block text-left justify-end">
            <button type="button"
                class="absolute top-0 right-0 inline-flex w-max justify-end bg-red-500 hover:bg-red-600 px-2 py-2 text-base font-medium rounded-md text-white"
                id="menu-button" aria-expanded="true" aria-haspopup="true" data-dropdown-toggle="moreOptions">
                <i class="fa-solid fa-ellipsis"></i>
            </button>
            <div class="absolute hidden w-max origin-top-right bg-primarycolor rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-20"
                role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" id="moreOptions">
                <div class="py-1 grid grid-cols-1" role="none">
                    <a href="{{ route('admin.products.extension.export', $product->id) }}"
                        class="block px-4 py-2 text-base text-gray-200 hover:bg-gray-800" role="menuitem" tabindex="-1"
                        id="menu-item-0">
                        {{ __('Export') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-6 text-gray-500 dark:text-darkmodetext dark:bg-secondary-100">
        <form method="POST" action="{{ route('admin.products.extension.update', $product->id) }}"
            enctype="multipart/form-data" id="formu">
            @csrf
            <div>
                <label for="server">{{ __('Server') }}</label>
                <div class="flex">
                    <select id="server"
                        class="block w-full rounded-md shadow-sm focus:ring-logo focus:border-logo sm:text-sm dark:bg-darkmode"
                        name="extension_id" required onchange="document.getElementById('submitt').disabled = false;">
                        @if ($extensions->count())
                        <option value="" disabled selected>None</option>
                        @foreach ($extensions as $server)
                        @if ($server->id == $product->extension_id)
                        <option value="{{ $server->id }}" selected>{{ $server->name }}
                        </option>
                        @else
                        <option value="{{ $server->id }}">{{ $server->name }}</option>
                        @endif
                        @endforeach
                        @else
                        <option value="">{{ __('No servers found') }}</option>
                        @endif
                    </select>
                    <button type="button" class="ml-2 form-submit text-sm w-40 disabled:cursor-not-allowed"
                        onclick="document.getElementById('formu').submit();" disabled id="submitt">
                        {{ __('Update server') }}
                    </button>
                </div>
            </div>
            @isset($extension)
            <div class="mt-6 text-gray-500 dark:text-darkmodetext dark:bg-secondary-100 grid grid-cols-2 gap-x-2">
                @foreach ($extension->productConfig as $setting)
                @if (!isset($setting->required))
                @php
                $setting->required = false;
                @endphp
                @endif
                @if ($setting->type == 'title')
                <div class="mt-4 col-span-2">
                    <div class="text-xl dark:text-darkmodetext">
                        {{ $setting->friendlyName }}
                    </div>
                    <p class="text-gray-500 dark:text-darkmodetext">
                        {{ $setting->description }}
                    </p>
                </div>
                @continue
                @endif
                <div class="mt-4">
                    <x-config-item :config="$setting" />
                </div>
                @endforeach
            </div>
            @endisset

            <div class="flex items-center justify-end mt-4" type="submit">
                <button class="form-submit">
                    {{ __('Update') }}
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>