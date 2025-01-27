<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['themes/' . config('settings::theme-active') . '/js/app.js', 'themes/' . config('settings::theme-active') . '/css/app.css'], config('settings::theme-active'))
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    @if (config('settings::app_logo'))
    <link rel="icon" href="{{ asset(config('settings::app_logo')) }}" type="image/png" />
    @else
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png" />
    @endif
    <meta content="{{ ucfirst($title) ?? config('settings::seo_title') }}" property="og:title" />
    <meta content="{{ $description ?? config('settings::seo_description') }}" property="og:description" />
    <meta content="{{ $description ?? config('settings::seo_description') }}" name="description" />
    <meta content='{{ $image ?? config(' settings::seo_image') }}' property='og:image'>
    <link type="application/json+oembed"
        href="{{ url('/') }}/manifest.json?title={{ config('app.name', 'Paymenter') }}&author_url={{ url('/') }}&author_name={{ config('app.name', 'Paymenter') }}" />
    <meta name="twitter:card" content="@if (config('settings::seo_twitter_card')) summary_large_image @endif" />
    @empty($title)
    <title>{{ config('app.name') }}</title>
    @else
    <title>{{ config('app.name') . ' | ' . ucfirst($title) }}</title>
    @endempty
</head>

<body>
    <x-paymenter-update />
    @include('layouts.topbar')
    @include('layouts.header')
    <main>
        <div class="container">
            @include('layouts.navigation')
            @include('layouts.features')
            <div class="site">
                <div class="content">
                    @if ($clients) @include('layouts.subnavigation') @endif
                    <section>
                        {{ $slot }}
                    </section>
                </div>
                <div class="sidebar">
                    @include('layouts.widget_auth')
                    @hasSection('widget_reviews')
                    @yield('widget_reviews')
                    @endif
                    @include('layouts.widget_support')
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footer')
    <div class="info">
        <div class="container">
            <div class="flex flex-col lg:flex-row justify-between">
                <p>
                    {{ __('Page was in') }} {{ round(microtime(true) - LARAVEL_START, 3) }} {{ __('seconds loaded.') }}.
                </p>
                @hasSection('paymenter_copyright')
                <p>
                    @yield('paymenter_copyright')
                </p>
                @endif
            </div>
        </div>
    </div>
</body>

</html>