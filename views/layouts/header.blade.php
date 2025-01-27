<header>
    <div class="container">
        <div>
            <div class="logo">
                <a href="{{ route('index') }}">
                    <x-branding class="lg:w-36 w-20" />
                </a>
                
            </div>
            <div class="login">
                <h1>
                    <a class="hover:text-red-600" href="{{ route('index') }}">
                        {{ config('app.name') }}
                    </a>
                </h1>
                <p>{{ config('app.slogan', 'Machs einfach. Zock kostenlos!') }}</p>
            </div>
        </div>
    </div>
</header>