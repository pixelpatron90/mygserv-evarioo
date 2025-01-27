<header>
    <div class="container">
        <div class="top">
            asdasd
        </div>
        <div class="bottom">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <x-branding class="w-36" />
                </a>
                <div class="title">
                    <h1>
                        <a class="hover:text-red-600" href="{{ route('index') }}">
                            {{ config('app.name') }}
                        </a>
                    </h1>
                    <p>{{ config('app.slogan', 'Machs einfach. Zock kostenlos!') }}</p>
                </div>
            </div>
        </div>
    </div>
</header>