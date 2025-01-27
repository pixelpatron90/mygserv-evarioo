<x-auth-layout>
    <div class="content">
        <div class="content-box">
            <x-alert alert="error">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </x-alert>
            <x-input-errors />
            <form method="POST" action="{{ route('password.confirm') }}" id="pw-confirm">
                @csrf
                <div class="mt-4 mb-4">
                    <x-input id="password" type="password" label="{{ __('Password') }}"
                        name="password" required autocomplete="new-password" >
                    </x-input>
                </div>
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
