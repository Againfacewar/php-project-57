<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a class="flex items-center" href="{{ route('dashboard') }}">
                        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">{{ __('hexlet.navigation.logo') }}</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.index')">
                        {{ __('hexlet.navigation.tasks') }}
                    </x-nav-link>
                    <x-nav-link :href="route('task_statuses.index')" :active="request()->routeIs('task_statuses.index')">
                        {{ __('hexlet.navigation.statuses') }}
                    </x-nav-link>
                    <x-nav-link :href="route('labels.index')" :active="request()->routeIs('labels.index')">
                        {{ __('hexlet.navigation.labels') }}
                    </x-nav-link>
                </div>
            </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-6 gap-4">
                    @auth()
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('hexlet.navigation.dropdown.logout') }}
                            </x-dropdown-link>
                        </form>
                    @endauth
                    @guest()
                            <a href="{{ route('login') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Вход</a>
                            <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Регистрация</a>
                    @endguest
                </div>



            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
{{--            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">--}}
{{--                {{ __('Dashboard') }}--}}
{{--            </x-responsive-nav-link>--}}
        </div>

        <!-- Responsive Settings Options -->
{{--        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">--}}
{{--            <div class="px-4">--}}
{{--                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>--}}
{{--                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>--}}
{{--            </div>--}}

{{--            <div class="mt-3 space-y-1">--}}
{{--                <x-responsive-nav-link :href="route('profile.edit')">--}}
{{--                    {{ __('Profile') }}--}}
{{--                </x-responsive-nav-link>--}}

{{--                <!-- Authentication -->--}}
{{--                <form method="POST" action="{{ route('logout') }}">--}}
{{--                    @csrf--}}

{{--                    <x-responsive-nav-link :href="route('logout')"--}}
{{--                            onclick="event.preventDefault();--}}
{{--                                        this.closest('form').submit();">--}}
{{--                        {{ __('Log Out') }}--}}
{{--                    </x-responsive-nav-link>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</nav>
