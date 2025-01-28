<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['themes/' . config('settings::theme-active') . '/js/app.js', 'themes/' . config('settings::theme-active') .
    '/css/app.css'], config('settings::theme-active'))
    @if (config('settings::app_logo'))
    <link rel="icon" href="{{ asset(config('settings::app_logo')) }}" type="image/png" />
    @else
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png" />
    @endif
    <meta content="{{ config('settings::seo_title') }}" property="og:title" />
    <meta content="{{ config('settings::seo_description') }}" property="og:description" />
    <meta content="{{ config('settings::seo_description') }}" name="description" />
    <meta content='{{ config(' settings::seo_image') }}' property='og:image'>
    <meta name="twitter:card" content="@if (config('settings::seo_twitter_card')) summary_large_image @endif" />
    <title>{{ config('app.name') }} | {{ __('Maintenance') }}</title>
</head>

<body class="auth">
    <x-paymenter-update />
    <div class="wrapper">
        <h2 class="block lg:hidden text-white text-4xl uppercase font-intertight font-bold text-center py-8">
            {{ config('app.name') }}
        </h2>
        <div class="hidden lg:flex justify-center items-center py-4">
            <x-branding class="w-36" />
        </div>
        <div class="bg-gray-200 p-2">
            <h1>
                {{ __('Maintenance on working') }}
            </h1>
        </div>
    </div>

</body>

</html>