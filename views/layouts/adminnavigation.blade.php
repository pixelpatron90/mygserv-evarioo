<nav class="z-50">
    <div class="container lg:flex lg:flex-row lg:justify-between">
        <div class="lg:flex lg:flex-row w-full">
            <div class="w-12 me-6 hidden lg:block">
                <svg version="1.1" viewBox="0 0 800 800" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                    <g stroke-width="5.2147">
                        <path d="m803 485.7v-41.196c0-68.678-27.482-103.04-82.445-103.04h-82.445c-54.963 0-82.445 34.365-82.445 103.04v20.598c0 41.196 10.325 72.119 30.923 92.718 20.598 20.598 44.638 34.365 72.119 41.196 27.482 6.8834 41.196 24.04 41.196 51.521v20.598h-602.3v-532.94l38.015 154.46h38.015l38.015-155.29v155.29h95.064v-265.17h-114.1l-29.046 94.073-12.724-0.83435-34.261-93.239h-114.1v746.75h717.96c54.963 0 82.445-34.365 82.445-103.04v-20.598c0-41.196-10.325-72.119-30.923-92.718-20.598-20.598-44.638-34.365-72.119-41.196-27.482-6.8834-41.196-24.04-41.196-51.521v-20.598h41.196v41.196h103.15z" fill="#fff"></path>
                        <path d="m635.76 492.07c0 50.374-25.396 75.509-76.239 75.509h-272.36c-50.843 0-76.239-25.187-76.239-75.509v-245.46c0-50.374 25.396-75.509 76.239-75.509h272.36c50.843 0 76.239 25.187 76.239 75.509v56.632h-95.325v-37.754h-234.24v207.7h234.24v-37.754h-133.39v-94.386h228.72z" fill="#058cd0"></path>
                    </g>
                </svg>
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
                        <i class="fa-solid fa-bars me-2"></i> {{ __('Products') }} <i class="ms-2 fa-solid fa-caret-down"></i>
                    </a>
                    <div class="relative" id="dropdownNavbarPage">
                        <ul class="" aria-labelledby="dropdownLargeButton">
                          <li>
                            <a href="{{ route('admin.products') }}" class="block w-full">
                                <i class="fa-solid fa-bars me-2"></i>
                                {{ __('All Pages') }}
                            </a>
                          </li>
                          <li>
                            <a href="{{ route('admin.products.create') }}" class="block w-full">
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
