<x-app-layout>
    <div class="content">
        <div class="content-box">
            <h2 class="text-lg text-secondary-200 font-semibold border-b-2 border-red-500 pb-2 mb-4">{{ __('Forgot Password') }}</h2>
            <x-alert alert="info">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </x-alert>
            <form method="POST" action="{{ route('password.email') }}" id="forget-password">
                @csrf
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" class="form-input" placeholder="{{ __('Email..') }}" name="email" id="email" />
                <x-recaptcha class="mt-4" form="forget-password" />
                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('login') }}" class="text-sm text-red-500 hover:text-red-600">
                        {{ __('Return to Login') }}
                    </a>
                    <button type="submit" class="form-submit">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
