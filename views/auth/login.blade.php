<x-auth-layout>
    <div class="content">
        <div class="content-box">
            <h2 class="text-lg text-secondary-200 font-semibold border-b-2 border-red-500 pb-2 mb-4">{{ __('Please login to continue...') }}</h2>
            <x-input-errors />
            <form method="POST" action="{{ route('login') }}" id="login">
                @csrf
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" required class="form-input" placeholder="{{ __('Email..') }}" name="email" id="email" />
                <div class="flex justify-between mt-4">
                    <label class="form-label" for="password">{{ __('Password') }}</label>
                    <a class="text-sm text-red-500 hover:text-red-600" href="{{ route('password.request') }}" class="underline">{{ __('Forgot Password?') }}</a>
                </div>
                <input type="password" required class="form-input" placeholder="{{ __('Password..') }}" name="password" id="password" />
                <x-input type="checkbox" name="remember" id="remember" label="Remember me" class="mt-4" />
                <x-recaptcha class="mt-4" form="login" />
                <div class="mt-3 flex justify-between items-right">
                    <div class="w-4/6">
                        <button type="submit" class="form-submit">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="w-2/6 content-center text-right">
                        <a href="{{ route('register') }}" class="text-sm text-red-500 hover:text-red-600">
                            {{ __('New here?') }}
                        </a>
                    </div>
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
                        <i class="fa-brands fa-discord fa-lg"></i>
                        {{ __('Sign in with Discord') }}
                    </a>
                    @endif
                    @if (config('settings::github_enabled'))
                    <a href="{{ route('social.login', 'github') }}"
                        class="button button-secondary !flex gap-x-2 items-center justify-center">
                        <i class="fa-brands fa-github fa-lg"></i>
                        {{ __('Sign in with GitHub') }}
                    </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

</x-auth-layout>