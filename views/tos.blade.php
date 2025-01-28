<x-app-layout title="Terms of Service">
    <div class="content ">
        <div class="content-box">
            <h1 class="mb-4 text-3xl tracking-tight font-bold text-secondary-200">
                Terms of Service
            </h1>
            <p class="mb-4 text-lg font-light text-secondary-200 italic">
                {{ __('Last Updated:') }} {{ config('settings::tos_last_updated') }}
            </p>
            <div>
                @markdownify(config('settings::tos_text'))
            </div>
        </div>
    </div>
</x-app-layout>