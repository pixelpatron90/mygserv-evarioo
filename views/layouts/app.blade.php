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
    <style>
        .snow {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 2;
            pointer-events: none;
        }
    </style>
    @vite(['themes/' . config('settings::theme-active') . '/js/app.js', 'themes/' . config('settings::theme-active') . '/css/app.css'], config('settings::theme-active'))
    <script src="ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
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
    <meta name="theme-color" content="#5270FD" />
    @empty($title)
    <title>{{ config('app.name', 'Paymenter') }}</title>
    @else
    <title>{{ config('app.name', 'Paymenter') . ' - ' . ucfirst($title) }}</title>
    @endempty
</head>

<body>
    <x-paymenter-update />
    <header>
        <div class="container">
            <div>
                <div class="logo">
                    <svg version="1.1" viewBox="0 0 800 800" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="5.2147">
                            <path
                                d="m803 485.7v-41.196c0-68.678-27.482-103.04-82.445-103.04h-82.445c-54.963 0-82.445 34.365-82.445 103.04v20.598c0 41.196 10.325 72.119 30.923 92.718 20.598 20.598 44.638 34.365 72.119 41.196 27.482 6.8834 41.196 24.04 41.196 51.521v20.598h-602.3v-532.94l38.015 154.46h38.015l38.015-155.29v155.29h95.064v-265.17h-114.1l-29.046 94.073-12.724-0.83435-34.261-93.239h-114.1v746.75h717.96c54.963 0 82.445-34.365 82.445-103.04v-20.598c0-41.196-10.325-72.119-30.923-92.718-20.598-20.598-44.638-34.365-72.119-41.196-27.482-6.8834-41.196-24.04-41.196-51.521v-20.598h41.196v41.196h103.15z"
                                fill="#fff" />
                            <path
                                d="m635.76 492.07c0 50.374-25.396 75.509-76.239 75.509h-272.36c-50.843 0-76.239-25.187-76.239-75.509v-245.46c0-50.374 25.396-75.509 76.239-75.509h272.36c50.843 0 76.239 25.187 76.239 75.509v56.632h-95.325v-37.754h-234.24v207.7h234.24v-37.754h-133.39v-94.386h228.72z"
                                fill="#058cd0" />
                        </g>
                    </svg>
                    <div class="title">
                        <h1>mygserv.de</h1>
                        <p>Machs einfach. Zock kostenlos!</p>
                    </div>
                </div>
                <div class="login">Login</div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">

            <nav>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-sm lg:hidden hover:bg-gray-100" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
                <div class="mt-1 lg:mt-0 hidden w-full lg:block h-full" id="navbar-default">
                  <ul>
                    <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                    @foreach (App\Models\Category::whereNull('category_id')->orderBy('order')->get() as $category)
                    @if ($category->products()->where('hidden', false)->count() > 0 || $category->children->count() > 0)
                    <li><a href="{{ route('products', $category->slug) }}">{{ $category->name }}</a></li>
                    @endif
                    @endforeach
                    <li><a href="{{ route('announcements.index') }}">{{ __('Announcements') }}</a></li>
                    <li><a href="{{ route('media.index') }}">{{ __('Media') }}</a></li>
                    <li><a href="{{ route('legalnotice.index') }}">{{ __('Legal notice') }}</a></li>
                </ul>
                </div>
            </nav>

            <div class="site">
                <div class="content">
                    @if ($clients) @include('layouts.subnavigation') @endif
                    <section>{{ $slot }}</section>
                </div>
                <div class="sidebar">
                    <div class="widget">
                        <div class="title">
                            <h1>» Kundenmeinungen</h1>
                        </div>
                        <div class="content">

                            @auth

                            <h1 class="w-full px-1 py-1 bg-red-500 text-white rounded-md">
                                {{ __('Welcome back,') }}
                                {{ Auth::user()->username }}
                            </h1>

                            <a href="{{ route('clients.profile') }}"
                                class="px-2 py-2 hover:bg-secondary-300 flex items-center gap-x-2 rounded transition-all ease-in-out">
                                <i class="ri-account-circle-line"></i> {{__('Profile')}}
                            </a>
                            @if (Auth::user()->has('ADMINISTRATOR'))
                            <a href="{{ route('admin.index') }}"
                                class="px-2 py-2 hover:bg-secondary-300 flex items-center gap-x-2 rounded transition-all ease-in-out">
                                <i class="ri-key-2-line"></i> {{ __('Admin area') }}
                            </a>
                            <a href="{{ route('clients.api.index') }}"
                                class="px-2 py-2 hover:bg-secondary-300 flex items-center gap-x-2 rounded transition-all ease-in-out">
                                <i class="ri-code-s-slash-line"></i> {{ __('API') }}
                            </a>
                            @endif

                            <a type="button" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="px-2 py-2 hover:bg-secondary-300 flex items-center gap-x-2 rounded transition-all ease-in-out">
                                <i class="ri-logout-box-line"></i> {{ __('Log Out') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>

                @else
                <a href="{{ route('login') }}" class="button button-primary md:flex-none flex-1">
                    {{ __('Log In') }}
                </a>
                @endauth

                        </div>
                    </div>
                    <div class="widget">
                        <div class="title">
                            <h1>» Kundenmeinungen</h1>
                        </div>
                        <div class="content">asdasd</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>Copyright © 2025 - 2026 www.mygserv.de & <a class="hover:text-red-500" href="https://www.evarioo.eu">www.evarioo.eu</a> | Alle Rechte vorbehalten.</p>
            <ul>
                <li><a href="{{ route('legalnotice.index') }}">{{ __('Legal notice') }}</a></li>
                <li><a href="{{ route('media.index') }}">{{ __('Media') }}</a></li>
            </ul>
        </div>
    </footer>
    <div class="info">
        <div class="container">
            <p>Seite wurde in {{ round(microtime(true) - LARAVEL_START, 3) }} Sekunden geladen</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>