<header>
    <div class="container">
        <div>
            <div class="logo">
                <a class="w-24" href="{{ route('index') }}">
                    <x-branding />
                </a>
                <div class="title">
                    <h1>{{ config('app.name') }}</h1>
                    <p>{{ config('app.slogan', 'Machs einfach. Zock kostenlos!') }}</p>
                </div>
            </div>
        </div>
    </div>
</header>