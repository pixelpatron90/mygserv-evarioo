<header>
    <div class="container">
        <div>
            <div class="logo">
                <a href="{{ route('index') }}">
                    <x-branding class="w-36" />
                </a>
                <div class="title">
                    <h1>{{ config('app.name') }}</h1>
                    <p>{{ config('app.slogan', 'Machs einfach. Zock kostenlos!') }}</p>
                </div>
            </div>
        </div>
    </div>
</header>