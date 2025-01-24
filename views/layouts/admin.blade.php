<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Admin - ' . $title }}</title>

    @vite(['themes/' . config('settings::theme-active') . '/js/admin.js', 'themes/' . config('settings::theme-active') . '/css/admin.css'], config('settings::theme-active'))

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    @if (config('settings::app_logo'))
        <link rel="icon" href="{{ asset(config('settings::app_logo')) }}" type="image/png">
    @else
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
    @endif
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark')
        } else {
            document.documentElement.classList.remove('dark')
        }
        window.addEventListener('keydown', function(e) {
            var ctrlDown = true;
            var ctrlKey = 17,
                enterKey = 13;
            $(document).keydown(function(e) {
                if (e.keyCode == ctrlKey) ctrlDown = true;
                if (e.keyCode == enterKey && ctrlDown) {
                    if ($('#submit').length) {
                        $('#submit').click();
                    }
                }
            }).keyup(function(e) {
                if (e.keyCode == ctrlKey) ctrlDown = false;
            });
        });
    </script>
    @rappasoftTableStyles
    @rappasoftTableThirdPartyStyles
</head>

<body>

    <nav class="z-50">
        <div class="container lg:flex lg:flex-row lg:justify-between">
            <div class="lg:flex lg:flex-row w-full">
                <div class="w-12 me-6 hidden lg:block">
                    <svg version="1.1" viewBox="0 0 800 800" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                        <g stroke-width="5.2147">
                            <path d="m803 485.7v-41.196c0-68.678-27.482-103.04-82.445-103.04h-82.445c-54.963 0-82.445 34.365-82.445 103.04v20.598c0 41.196 10.325 72.119 30.923 92.718 20.598 20.598 44.638 34.365 72.119 41.196 27.482 6.8834 41.196 24.04 41.196 51.521v20.598h-602.3v-532.94l38.015 154.46h38.015l38.015-155.29v155.29h95.064v-265.17h-114.1l-29.046 94.073-12.724-0.83435-34.261-93.239h-114.1v746.75h717.96c54.963 0 82.445-34.365 82.445-103.04v-20.598c0-41.196-10.325-72.119-30.923-92.718-20.598-20.598-44.638-34.365-72.119-41.196-27.482-6.8834-41.196-24.04-41.196-51.521v-20.598h41.196v41.196h103.15z" fill="#fff"></path>
                            <path d="m635.76 492.07c0 50.374-25.396 75.509-76.239 75.509h-272.36c-50.843 0-76.239-25.187-76.239-75.509v-245.46c0-50.374 25.396-75.509 76.239-75.509h272.36c50.843 0 76.239 25.187 76.239 75.509v56.632h-95.325v-37.754h-234.24v207.7h234.24v-37.754h-133.39v-94.386h228.72z" fill="#058cd0"></path>
                        </g>
                    </svg>
                </div>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-3.5 w-8 h-8 justify-center text-white rounded-sm lg:hidden bg-red-500 hover:bg-red-600" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="mt-4 lg:mt-0 hidden lg:block h-full" id="navbar-default">
                <ul>
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <i class="fa-solid fa-bars me-2"></i> {{ __('Dashboard') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders') }}">
                            <i class="fa-solid fa-bars me-2"></i> {{__('Orders')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.invoices') }}">
                            <i class="fa-solid fa-bars me-2"></i> {{__('Invoices')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.invoices') }}">
                            <i class="fa-solid fa-bars me-2"></i> {{__('Invoices')}}
                        </a>
                    </li>
                </ul>
                </div>
            </div>
            <div class="hidden lg:block content-center">
                LOGIN
            </div>
        </div>
    </nav>

    <main class="mt-6 mb-6">
        <div class="container">
            @if (!request()->routeIs('admin.index'))
                {{ Breadcrumbs::render() }}
                <div class="content-box">
                    {{ $slot }}
                </div>
            @else
                {{ $slot }}
            @endif
        </div>
    </main>

    <footer>

        <div class="container">
            <div class="flex flex-col sm:flex-row justify-between">
                <div>
                    <p>Copyright © 2025 - 2026 www.mygserv.de & <a class="text-red-500 hover:text-red-600" href="https://www.evarioo.eu">www.evarioo.eu</a> | Alle Rechte vorbehalten.</p>
                </div>
                <div>
                    <ul>
                        <li>
                            <a class="text-red-500 hover:text-red-600" href="https://www.evarioo.eu">Startseite</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </footer>

    <x-success />
    @rappasoftTableScripts
    @rappasoftTableThirdPartyScripts

  </body>
</html>
