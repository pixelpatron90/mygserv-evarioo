<x-admin-layout :title="__('Editing ') . $product->name">
    @include('admin.products.tabbar', ['tab' => 'extension'])
    <div class="text-2xl text-secondary-300 mt-4 mb-4">
        {{ __('Update product server') }} {{ $product->name }}
    </div>
    <form method="POST" action="{{ route('admin.products.extension.update', $product->id) }}"
        enctype="multipart/form-data" id="formu">
        @csrf

        <div class="flex lg:flex-row flex-col gap-y-2 lg:gap-y-0 justify-between">
            <div class="w-5/6">
                <select id="server" class="form-select !w-full" name="extension_id" required
                    onchange="document.getElementById('submitt').disabled = false;">
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
            </div>
            <div class="w-1/6">
                <button type="button" class="form-submit !w-full" onclick="document.getElementById('formu').submit();"
                    disabled id="submitt">
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

        <div class="flex items-center justify-start">
            <button type="submit" class="form-submit">
                {{ __('Update') }}
            </button>
        </div>
    </form>
</x-admin-layout>