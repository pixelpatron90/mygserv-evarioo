<nav class="z-50">
    <div class="container lg:flex lg:flex-row lg:justify-between">
        <div class="lg:flex lg:flex-row w-full">
            <div class="w-12 me-6 hidden lg:block">
                <a href="{{ route('index') }}">
                <x-branding />
                </a>
            </div>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-3.5 w-8 h-8 justify-center text-white rounded-sm lg:hidden bg-red-500 hover:bg-red-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="mt-4 lg:mt-0 hidden lg:block h-full" id="navbar-default">
            <ul>
                <li>
                    <a href="{{ route('admin.index') }}">
                        <i class="fa-solid fa-bars me-2"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders') }}">
                        <i class="fa-solid fa-bars me-2"></i> {{__('Orders')}}
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.invoices') }}">
                        <i class="fa-solid fa-bars me-2"></i> {{__('Invoices')}}
                    </a>
                </li>
                <li>
                    <a id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarEmail" class="cursor-pointer">
                        <i class="fa-solid fa-bars me-2"></i> {{ __('Emails') }} <i class="ms-2 fa-solid fa-caret-down"></i>
                    </a>
                    <div class="relative" id="dropdownNavbarEmail">
                        <ul class="" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="{{ route('admin.email') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Logs') }}
                            </a>
                          </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarProduct" class="cursor-pointer">
                        <i class="fa-solid fa-bars me-2"></i> {{ __('Products') }} <i class="ms-2 fa-solid fa-caret-down"></i>
                    </a>
                    <div class="relative" id="dropdownNavbarProduct">
                        <ul class="" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="{{ route('admin.products') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('All Products') }}
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('admin.products.create') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Create Product') }}
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('admin.categories') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Categories') }}
                            </a>
                          </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarPage" class="cursor-pointer">
                        <i class="fa-solid fa-bars me-2"></i> {{ __('Pages') }} <i class="ms-2 fa-solid fa-caret-down"></i>
                    </a>
                    <div class="relative" id="dropdownNavbarPage">
                        <ul class="" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="{{ route('admin.pages') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('All Pages') }}
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('admin.pages.create') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Create Page') }}
                            </a>
                          </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbarSettings" class="cursor-pointer">
                        <i class="fa-solid fa-bars me-2"></i> {{ __('Settings') }} <i class="ms-2 fa-solid fa-caret-down"></i>
                    </a>
                    <div class="relative" id="dropdownNavbarSettings">
                        <ul class="" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="{{ route('admin.settings') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Settings') }}
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('admin.extensions') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Extensions') }}
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('admin.coupons') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Coupons') }}
                            </a>
                          </li>

                          <li>
                            <a href="{{ route('admin.announcements')}}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Announcements') }}
                            </a>
                          </li>

                          <li>
                            <a href="{{ route('admin.roles') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Roles') }}
                            </a>
                          </li>

                          <li>
                            <a href="{{ route('admin.taxes') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Taxes') }}
                            </a>
                          </li>

                          <li>
                            <a href="{{ route('admin.logs') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Logs') }}
                            </a>
                          </li>

                          <li>
                            <a href="{{ route('admin.configurable-options')}}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('Options') }}
                            </a>
                          </li>
                        </ul>
                    </div>
                </li>
            </ul>
            </div>
        </div>
        <div class="hidden lg:block content-center">
            LOGIN
        </div>
    </div>
</nav>
