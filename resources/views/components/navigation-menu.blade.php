<nav class="bg-white border-b border-gray-100 select-none">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-navigation-menu.application-mark class="block h-9 w-auto"/>
                    </a>
                </div>

                @if(request()->routeIs('auth.*'))
                    <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-navigation-menu.nav-link href="{{ route('auth.login') }}" :active="request()->routeIs('auth.login')">
                                {{ __('Đăng nhâp') }}
                            </x-navigation-menu.nav-link>

                            <x-navigation-menu.nav-link href="{{ route('auth.register') }}"
                                                        :active="request()->routeIs('auth.register')">
                                {{ __('Đăng ký') }}
                            </x-navigation-menu.nav-link>
                        </div>
                @else
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-navigation-menu.nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Trang chủ') }}
                    </x-navigation-menu.nav-link>

                    <x-navigation-menu.nav-link href="{{ route('person.index') }}"
                                                :active="request()->routeIs('person.index')">
                        {{ __('Nhân khẩu') }}
                    </x-navigation-menu.nav-link>

                    <x-navigation-menu.nav-link href="{{ route('families.index') }}"
                                                :active="request()->routeIs('families.index')">
                        {{ __('Hộ khẩu') }}
                    </x-navigation-menu.nav-link>

                    <x-navigation-menu.nav-link href="{{ route('declarations.index') }}"
                                                :active="request()->routeIs('declarations.index')">
                        {{ __('Khai báo thông tin dịch tễ') }}
                    </x-navigation-menu.nav-link>
                </div>

                @endif
            </div>

            @if(!request()->routeIs('auth.*'))
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-navigation-menu.dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-navigation-menu.dropdown-link href="">
                                {{ __('Profile') }}
                            </x-navigation-menu.dropdown-link>

                            <div class="border-t border-gray-100"/>

                            <!-- Authentication -->
                            <form method="POST" action="">
                                @csrf

                                <x-navigation-menu.dropdown-link href=""
                                                                 onclick="event.preventDefault();this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-navigation-menu.dropdown-link>
                            </form>
                        </x-slot>
                    </x-navigation-menu.dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            @endif
        </div>
    </div>
</nav>
