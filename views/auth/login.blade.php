<x-app-layout>
    <div class="content flex items-center justify-center flex-col">
        <div class="content-box w-full">

            <h2 class="text-lg text-secondary-200 font-semibold border-b-2 border-red-500 pb-2">{{ __('Login to continue') }}</h2>

            <form method="POST" action="{{ route('login') }}" id="login">
                @csrf

                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" class="form-input" placeholder="{{ __('Email..') }}" name="email" id="email" />

                <div class="flex justify-between mt-4 mb-1">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <a class="text-sm text-red-500 hover:text-red-600" href="{{ route('password.request') }}" class="underline">{{ __('Forgot Password?') }}</a>
                </div>

                <input type="password" class="form-input" placeholder="{{ __('Password..') }}" name="password" id="password" />

                <x-input type="checkbox" name="remember" id="remember" label="Remember me" class="mt-4" />

                <button class="form-submit mt-4">{{ __('Login') }}</button>

                <a href="{{ route('register') }}" class="text-sm text-secondary-200 underline mt-4 block text-center">{{
                    __('New here? Create an account.') }}</a>

                <div class="flex items-center justify-center mt-4">
                    <x-recaptcha form="login" />
                </div>

            </form>

            @if (config('settings::discord_enabled') == 1 ||
                config('settings::apple_enabled') == 1 ||
                config('settings::google_enabled') == 1 ||
                config('settings::github_enabled') == 1)
                <div class="flex items-center my-2">
                    <div class="w-full h-0.5 bg-secondary-200"></div>
                    <div class="px-5 text-center text-secondary-500">{{ __('or') }}</div>
                    <div class="w-full h-0.5 bg-secondary-200"></div>
                </div>
                <div class="space-y-2">
                    @if (config('settings::discord_enabled'))
                    <a href="{{ route('social.login', 'discord') }}"
                        class="button button-secondary !flex gap-x-2 items-center justify-center">
                        <svg class="w-5 h-5 mr-2 text-white" viewBox="0 0 127.14 96.36"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Discord_Logo_-_Large_-_White" data-name="Discord Logo - Large - White">
                                <path fill="#ffffff"
                                    d="M107.7,8.07A105.15,105.15,0,0,0,81.47,0a72.06,72.06,0,0,0-3.36,6.83A97.68,97.68,0,0,0,49,6.83,72.37,72.37,0,0,0,45.64,0,105.89,105.89,0,0,0,19.39,8.09C2.79,32.65-1.71,56.6.54,80.21h0A105.73,105.73,0,0,0,32.71,96.36,77.7,77.7,0,0,0,39.6,85.25a68.42,68.42,0,0,1-10.85-5.18c.91-.66,1.8-1.34,2.66-2a75.57,75.57,0,0,0,64.32,0c.87.71,1.76,1.39,2.66,2a68.68,68.68,0,0,1-10.87,5.19,77,77,0,0,0,6.89,11.1A105.25,105.25,0,0,0,126.6,80.22h0C129.24,52.84,122.09,29.11,107.7,8.07ZM42.45,65.69C36.18,65.69,31,60,31,53s5-12.74,11.43-12.74S54,46,53.89,53,48.84,65.69,42.45,65.69Zm42.24,0C78.41,65.69,73.25,60,73.25,53s5-12.74,11.44-12.74S96.23,46,96.12,53,91.08,65.69,84.69,65.69Z" />
                            </g>
                        </svg>
                        {{ __('Sign in with Discord') }}
                    </a>
                    @endif
                    @if (config('settings::github_enabled'))
                    <a href="{{ route('social.login', 'github') }}"
                        class="button button-secondary !flex gap-x-2 items-center justify-center">
                        <svg class="w-5 h-5 mr-2 text-white" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 0C4.477 0 0 4.477 0 10C0 14.92 3.59 18.89 8.21 19.81C8.83 19.86 9.02 19.47 9.02 19.12C9.02 18.77 9.01 17.92 9.01 16.76C5.83 17.45 5.37 15.79 5.37 15.79C4.96 14.94 4.34 14.5 4.34 14.5C3.62 13.86 4.5 13.88 4.5 13.88C5.3 13.95 5.83 14.73 5.83 14.73C6.74 16.04 8.34 15.6 9.05 15.38C9.16 15.08 9.34 14.72 9.55 14.4C7.18 14.14 4.67 13.42 4.67 9.58C4.67 8.62 5.07 7.82 5.68 7.17C5.54 6.92 5.14 6.09 5.82 4.97C5.82 4.97 6.63 4.74 8.23 5.71C9.1 5.42 10.06 5.28 11.02 5.27C11.98 5.28 12.94 5.42 13.81 5.71C15.41 4.74 16.22 4.97 16.22 4.97C16.9 6.09 16.5 6.92 16.36 7.17C16.97 7.82 17.37 8.62 17.37 9.58C17.37 13.42 14.86 14.14 12.49 14.4C12.7 14.72 12.88 15.08 12.99 15.38C13.7 15.6 15.3 16.04 16.21 14.73C16.21 14.73 16.74 13.95 17.54 13.88C17.54 13.88 18.42 13.86 17.7 14.5C17.7 14.5 17.08 14.94 16.67 15.79C16.67 15.79 16.21 17.45 13.03 16.76C13.03 17.92 13.02 18.77 13.02 19.12C13.02 19.47 13.21 19.86 13.83 19.81C18.41 18.89 22 14.92 22 10C22 4.477 17.523 0 12 0H10Z"
                                fill="#ffffff" />
                        </svg>
                        {{ __('Sign in with GitHub') }}
                    </a>
                    @endif
                </div>
                @endif
        </div>
    </div>

</x-app-layout>