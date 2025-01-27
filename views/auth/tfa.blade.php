<x-auth-layout>
    <div class="content">
        <div class="content-box">
            <h2 class="text-lg text-secondary-200 font-semibold border-b-2 border-red-500 pb-2 mb-4">{{ __('Two Factor Authentication') }}</h2>
            <x-alert alert="error">
                {{ __('Please enter the code from your authenticator app.') }}
            </x-alert>
            <x-input-errors />
            <form method="POST" action="{{ route('tfa') }}" id="tfa">
                @csrf
                <label class="form-label" for="code">{{ __('Code') }}</label>
                <input type="text" required class="form-input" placeholder="{{ __('Code') }}" name="code" id="code" />
                <x-recaptcha form="tfa" />
                <div class="flex items-center justify-start mt-4">
                    <button type="submit" class="button button-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-auth-layout>
