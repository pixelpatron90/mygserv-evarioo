<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
      if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    </script>
    @vite(['themes/' . config('settings::theme-active') . '/js/app.js', 'themes/' . config('settings::theme-active') . '/css/app.css'], config('settings::theme-active'))
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <script src="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
" rel="stylesheet">
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
    @include('layouts.header')
    <main>
        <div class="container">
            @include('layouts.navigation')

            @if(Route::is('index') )

            <div class="carousel">
                <section class="splide" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                          <ul class="splide__list">
                              <li class="splide__slide">Slide 01</li>
                              <li class="splide__slide">Slide 02</li>
                              <li class="splide__slide">Slide 03</li>
                          </ul>
                    </div>
                  </section>
            </div>
            
            @endif

            

            <div class="site">
                <div class="content">
                    @if ($clients) @include('layouts.subnavigation') @endif
                    <section>
                        {{ $slot }}
                    </section>
                </div>
                <div class="sidebar">
                    <div class="widget">
                        <div class="title">
                            <h1><i class="fa-solid fa-angle-right me-2"></i> {{ __('Authentication') }}</h1>
                        </div>
                        <div class="content">
                            @auth
                            <h1 class="w-full p-2 mb-1.5 bg-red-500 text-white rounded-md">
                                {{ __('Welcome back,') }}
                                {{ Auth::user()->username }}
                            </h1>
                            <a href="{{ route('clients.profile') }}"
                                class="px-2 py-2 hover:bg-secondary-300 flex items-center gap-x-2 rounded-md transition-all ease-in-out">
                                <i class="fa-solid fa-caret-right me-2"></i> {{__('Profile')}}
                            </a>
                            @if (Auth::user()->has('ADMINISTRATOR'))
                            <a target="_blank" href="{{ route('admin.index') }}"
                                class="px-2 py-2 hover:bg-secondary-300 flex items-center gap-x-2 rounded-md transition-all ease-in-out">
                                <i class="fa-solid fa-caret-right me-2"></i> {{ __('Admin area') }}
                            </a>
                            <a href="{{ route('clients.api.index') }}"
                                class="px-2 py-2 hover:bg-secondary-300 flex items-center gap-x-2 rounded-md transition-all ease-in-out">
                                <i class="fa-solid fa-caret-right me-2"></i> {{ __('API') }}
                            </a>
                            @endif
                            <a type="button" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="px-2 py-2 hover:bg-secondary-300 flex items-center gap-x-2 rounded-md transition-all ease-in-out">
                                <i class="fa-solid fa-caret-right me-2"></i> {{ __('Log Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                            @else
                            <a href="{{ route('login') }}" class="button bg-red-500 w-full hover:bg-red-600 text-white md:flex-none flex-1">
                                <i class="fa-solid fa-caret-right me-2"></i> {{ __('Login') }}
                            </a>
                            <div class="flex items-center my-2">
                                <div class="w-full h-0.5 bg-secondary-200"></div>
                                <div class="px-5 text-center text-secondary-500">{{ __('or') }}</div>
                                <div class="w-full h-0.5 bg-secondary-200"></div>
                            </div>
                            <a href="{{ route('register') }}" class="button bg-red-500 w-full hover:bg-red-600 text-white md:flex-none flex-1">
                                <i class="fa-solid fa-caret-right me-2"></i> {{ __('Register') }}
                            </a>
                            @endauth
                        </div>
                    </div>
                    @hasSection('widget_reviews')
                    @yield('widget_reviews')
                    @endif
                    <div class="widget">
                        <div class="title">
                            <h1><i class="fa-solid fa-angle-right me-2"></i> {{ __('Support') }}</h1>
                        </div>
                        <div class="content">
                            <p>
                                {{ __('This is how you reach us:') }}
                            </p>
                            <ul class="mt-2">
                                <li class="bg-red-500 hover:bg-red-600 text-white rounded-md p-2 mb-1">
                                    <a href="mailto:info@mygserv.de" target="_blank">
                                        <i class="fa-solid fa-envelope me-2"></i> {{ __('Mail') }}
                                    </a>
                                </li>
                                <li class="bg-primarycolor hover:bg-gray-900 text-white rounded-md p-2 mb-1">
                                    <a target="_blank" href="https://discord.mygserv.de" target="_blank">
                                        <i class="fa-brands fa-discord me-2"></i> {{ __('Discord') }}
                                    </a>
                                </li>
                                <li class="bg-red-500 hover:bg-red-600 text-white rounded-md p-2 ">
                                    <a target="_blank" href="https://wiki.mygserv.de" target="_blank">
                                        <i class="fa-brands fa-wikipedia-w me-2"></i> {{ __('Wikipedia') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
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