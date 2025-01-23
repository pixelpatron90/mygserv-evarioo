<x-app-layout>
    <div class="min-h-[50vh] flex items-center justify-center flex-col">
        <div class="w-full content-box">
            <div class="mb-4 bg-red-500 p-4 text-white rounded-md">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" id="pw-confirm">
                @csrf
                <!-- Password -->
                <div class="mt-4 mb-4">
                    <x-input id="password" type="password" label="{{ __('Password') }}"
                        name="password" required autocomplete="new-password" >
                    </x-input>
                </div>
                <x-recaptcha form="pw-confirm" />
                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="button bg-red-500 hover:text-red-600 text-white">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
