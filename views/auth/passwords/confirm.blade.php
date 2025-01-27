<x-auth-layout>
    <div class="content">
        <div class="content-box">
            <x-alert alert="error">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </x-alert>
            <x-input-errors />
            <form method="POST" action="{{ route('password.confirm') }}" id="pw-confirm">
                @csrf
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <input type="password" autocomplete="new-password" required class="form-input" placeholder="{{ __('Password') }}" name="password" id="password" />
                <x-recaptcha form="pw-confirm" />
                <div class="flex justify-start mt-4">
                    <button type="submit"
                        class="button bg-red-500 hover:bg-red-600 text-white">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-auth-layout>
