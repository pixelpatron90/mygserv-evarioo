<footer>
    <div class="container">
        <p>Copyright © {{ date('Y') }} <a class="text-red-500 hover:text-red-600" href="{{ route('index') }}">{{ config('app.name') }}</a> & <a class="text-red-500 hover:text-red-600" href="https://www.evarioo.eu">www.evarioo.eu</a> | Alle Rechte vorbehalten.</p>
        <ul>
            <li><a href="{{ route('legalnotice.index') }}">{{ __('Legal notice') }}</a></li>
            <li><a href="{{ route('media.index') }}">{{ __('Media') }}</a></li>
        </ul>
    </div>
</footer>