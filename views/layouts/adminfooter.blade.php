<footer>
    <div class="container">
        <div class="flex flex-col sm:flex-row justify-between">
            <div>
                <p>Copyright © {{ date('Y') }} <a class="text-red-500 hover:text-red-600" href="{{ route('index') }}">{{ config('app.name') }}</a> & <a class="text-red-500 hover:text-red-600" href="https://www.evarioo.eu">www.evarioo.eu</a> | Alle Rechte vorbehalten.</p>
            </div>
            <div class="lg:block hidden">
                <ul>
                    <li>
                        <a class="text-red-500 hover:text-red-600" href="{{ route('index') }}">
                            <i class="fa-solid fa-caret-right me-2"></i> {{ __('back to :app_name', ['app_name' => config('app.name')]) }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>