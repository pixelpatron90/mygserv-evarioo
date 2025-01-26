<x-app-layout>
    <div class="content">
        @if (config('settings::registrationAbillity_disable') == 1)
        <x-alert alert="error">
            {{ __('Registration is currently not activated. Please try again soon.') }}
        </x-alert>
        @else
        <div class="content-box">
            <h2 class="text-lg text-secondary-200 font-semibold border-b-2 border-red-500 pb-2 mb-4">{{ __('Make an Account') }}</h2>
            <form method="POST" action="{{ route('register') }}" id="register">
                @csrf
                <div class="grid grid-cols-4 lg:gap-4 gap-y-2 mb-4">
                    <div class="lg:col-span-2 col-span-4">
                        <label class="form-label" for="first_name">{{ __('First name') }}</label>
                        <input type="name" class="form-input" placeholder="{{ __('First name') }}" name="first_name" id="first_name" />
                    </div>
                    <div class="lg:col-span-2 col-span-4">
                        <label class="form-label" for="last_name">{{ __('Last name') }}</label>
                        <input type="name" class="form-input" placeholder="{{ __('Last name') }}" name="last_name" id="last_name" />
                    </div>
                    <div class="col-span-4">
                        <label class="form-label" for="username">{{ __('Username') }}</label>
                        <input type="name" class="form-input" placeholder="{{ __('Username') }}" name="username" id="username" />
                    </div>
                </div>

                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" class="form-input" placeholder="{{ __('Email..') }}" name="email" id="email" />

                <div class="grid grid-cols-4 lg:gap-4 gap-y-2 mt-4">
                    <div class="lg:col-span-2 col-span-4">
                        <label class="form-label" for="last_name">{{ __('Password') }}</label>
                        <input type="password" required class="form-input" placeholder="{{ __('Password') }}" name="password" id="password" />
                    </div>
                    <div class="lg:col-span-2 col-span-4">
                        <label class="form-label" for="last_name">{{ __('Confirm Password') }}</label>
                        <input type="password" required class="form-input" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" id="password-confirm" />
                    </div>
                </div>
                <x-recaptcha class="mt-4" form="register" />
                <div class="mt-3 flex justify-between items-center">
                    <div class="w-3/6">
                        <a href="{{ route('login') }}" class="text-sm text-red-500 hover:text-red-600">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                    <div class="w-3/6">
                        <button type="submit" class="form-submit">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @endif
    </div>
</x-app-layout>