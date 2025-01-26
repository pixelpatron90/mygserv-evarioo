<x-app-layout>

    <div class="content flex items-center justify-center flex-col">

        @if (config('settings::registrationAbillity_disable') == 1)
        <div class="w-full text-center pb-7 pt-7 mb-5 bg-red-500 rounded-lg">
            <h1 class="font-bold text-white">REGISTRATION IS CURRENTLY DISABLED</h1>
        </div>
        @else

        <div class="content-box w-full">

            <h2 class="text-lg text-secondary-200 font-semibold border-b-2 border-red-500 pb-2 mb-4">{{ __('Make an Account') }}</h2>

            <form method="POST" action="{{ route('register') }}" id="register">
                @csrf
                <div class="flex flex-row gap-4 mb-4">
                    <div class="flex-1">
                        <label class="form-label" for="first_name">{{ __('First name') }}</label>
                        <input type="name" class="form-input" placeholder="{{ __('First name') }}" name="first_name" id="first_name" />
                    </div>
                    <div class="flex-1">
                        <label class="form-label" for="last_name">{{ __('Last name') }}</label>
                        <input type="name" class="form-input" placeholder="{{ __('Last name') }}" name="last_name" id="last_name" />
                    </div>
                    <div class="flex-1">
                        <label class="form-label" for="username">{{ __('Username') }}</label>
                        <input type="name" class="form-input" placeholder="{{ __('Username') }}" name="username" id="username" />
                    </div>
                </div>

                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" class="form-input" placeholder="{{ __('Email..') }}" name="email" id="email" />

                <div class="flex flex-row gap-4 mt-4">
                    <div class="w-3/6">
                        <label class="form-label" for="last_name">{{ __('Password') }}</label>
                        <input type="password" required class="form-input" placeholder="{{ __('Password') }}" name="password" id="password" />
                    </div>
                    <div class="w-3/6">
                        <label class="form-label" for="last_name">{{ __('Confirm Password') }}</label>
                        <input type="password" required class="form-input" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" id="password-confirm" />
                    </div>
                </div>
                <div class="flex items-center justify-center mt-4">
                    <x-recaptcha form="register" />
                </div>
                <div class="mt-3 flex justify-between items-center">
                    <div class="w-3/6">
                        <a href="{{ route('login') }}" class="text-sm text-secondary-200 font-bold">
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