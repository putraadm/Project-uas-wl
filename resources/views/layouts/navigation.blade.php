<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ Auth::user()->role == 'owner' ? route('owner.dashboard') : route('dashboard') }}">
                        <!-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> -->
                         <img class="block h-9 w-auto fill-current text-gray-800" src="{{ asset('/assets/pang-pang-korean food.jpeg') }}" alt="logo-pang-pang-korean-food"></img>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    
                    <!-- Owner link -->
                    @if(Auth::user()->role == 'owner')
                        <x-nav-link :href="Auth::user()->role == 'owner' ? route('owner.dashboard') : route('dashboard')" :active="Auth::user()->role == 'owner' ? request()->routeIs('owner.dashboard') : request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        
                        <x-nav-link href="{{ route('owner.laporan') }}" :active=" request()->routeIs('owner.laporan')">
                            {{ __('Report') }}
                        </x-nav-link>
                        
                        <x-nav-link href="{{ route('owner.chart') }}" :active=" request()->routeIs('owner.chart')">
                            {{ __('Graph Chart') }}
                        </x-nav-link>
                     @endif
                    
                     <!-- Kasir link -->
                     @if(Auth::user()->role == 'kasir')
                        

                        <x-nav-link href="{{ route('kasir.product') }}" :active=" request()->routeIs('kasir.product')">
                            {{ __('Product') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('orders.index') }}" :active=" request()->routeIs('orders.index')">
                            {{ __('Order') }}
                        </x-nav-link>

                        <!-- <x-nav-link href="order_list" :active=" request()->routeIs('kasir.order_list')">
                            {{ __('Order List') }}
                        </x-nav-link> -->

                        <x-nav-link href="{{ route('kasir.kategori') }}" :active=" request()->routeIs('kasir.kategori')">
                            {{ __('Kategori') }}
                        </x-nav-link>
                     @endif
                </div>


            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
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
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <!-- Owner link -->
            @if(Auth::user()->role == 'owner')
                <x-responsive-nav-link href="owner/product" :active=" request()->routeIs('owner.product')">
                    {{ __('Product') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="owner/report" :active=" request()->routeIs('owner.report')">
                    {{ __('Report') }}
                </x-responsive-nav-link>
             @endif
            
             <!-- Kasir link -->
             @if(Auth::user()->role == 'kasir')
                
                <x-responsive-nav-link href="product" :active=" request()->routeIs('kasir.product')">
                    {{ __('Product') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="order" :active=" request()->routeIs('kasir.order')">
                    {{ __('Order') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link href="order_list" :active=" request()->routeIs('kasir.order_list')">
                    {{ __('Order List') }}
                </x-responsive-nav-link>
                
                <x-responsive-nav-link href="kategori" :active=" request()->routeIs('kasir.kategori')">
                    {{ __('Kategori') }}
                </x-responsive-nav-link>
             @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
