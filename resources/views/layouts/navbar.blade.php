<div class="antialiased bg-gray-900">
    <div class="w-full text-gray-200 bg-gray-800">
        <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-between p-4">
                <a href="{{ route('home') }}" class="text-lg font-semibold tracking-widest text-white uppercase rounded-lg focus:outline-none">{{ config('app.name', 'Laravel') }}</a>
                <button class="rounded-lg md:hidden focus:outline-none" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
                @include('layouts.search')
                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-200 bg-transparent rounded-lg hover:bg-gray-600 focus:bg-gray-600 focus:text-white hover:text-white md:mt-0 md:ml-4 focus:outline-none" href="{{ route('products.index') }}">
                    Products
                </a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold text-gray-200 bg-transparent rounded-lg hover:bg-gray-600 focus:bg-gray-600 focus:text-white hover:text-white md:mt-0 md:ml-4 focus:outline-none" href="{{ route('cart.index') }}">
                    Cart 
                    <span class="px-2 py-1 ml-1 text-xs font-bold text-white bg-gray-900 rounded-lg">
                        {{ Cart::count() }}
                    </span>
                </a>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left text-gray-200 bg-transparent rounded-lg focus:text-white hover:text-white focus:bg-gray-600 hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 focus:outline-none">
                    @auth
                    <span>{{ auth()->user()->name }}</span>
                    @else
                    <span>Account</span>
                    @endauth
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-10 w-full mt-2 origin-top-right md:max-w-screen-sm md:w-screen">
                        <div class="px-2 pt-2 pb-4 bg-gray-700 rounded-md shadow-lg">
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                @auth
                                <a class="flex items-start p-2 text-gray-200 bg-transparent rounded-lg row hover:bg-gray-600 focus:bg-gray-600 focus:text-white hover:text-white focus:outline-none" href="#">
                                <div class="p-3 text-white bg-teal-500 rounded-lg">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4 md:h-6 md:w-6"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-semibold">My Accounts</p>
                                    <p class="mt-2 text-sm">Accounts Settings</p>
                                </div>
                                </a>
                                <a class="flex items-start p-2 text-gray-200 bg-transparent rounded-lg row hover:bg-gray-600 focus:bg-gray-600 focus:text-white hover:text-white focus:outline-none" href="{{ route('user.orders') }}">
                                <div class="p-3 text-white bg-teal-500 rounded-lg">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4 md:h-6 md:w-6"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-semibold">My Orders</p>
                                    <p class="mt-2 text-sm">Orders List</p>
                                </div>
                                </a>
                                <a class="flex items-start p-2 text-gray-200 bg-transparent rounded-lg row hover:bg-gray-600 focus:bg-gray-600 focus:text-white hover:text-white focus:outline-none" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="p-3 text-white bg-teal-500 rounded-lg">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4 md:h-6 md:w-6"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-semibold">Logout</p>
                                    <p class="mt-2 text-sm">Log out of the account</p>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                                </a>
                                @else
                                <a class="flex items-start p-2 text-gray-200 bg-transparent rounded-lg row hover:bg-gray-600 focus:bg-gray-600 focus:text-white hover:text-white focus:outline-none" href="{{ route('login') }}">
                                <div class="p-3 text-white bg-teal-500 rounded-lg">
                                    <svg aria-hidden="true" data-prefix="fas" data-icon="sign-in-alt" class="w-4 h-4 md:h-6 md:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"/></svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-semibold">Login</p>
                                    <p class="mt-2 text-sm">Log into your account</p>
                                </div>
                                </a>
                                <a class="flex items-start p-2 text-gray-200 bg-transparent rounded-lg row hover:bg-gray-600 focus:bg-gray-600 focus:text-white hover:text-white focus:outline-none" href="{{ route('register') }}">
                                <div class="p-3 text-white bg-teal-500 rounded-lg">
                                    <svg aria-hidden="true" data-prefix="fas" data-icon="sign-out-alt" class="w-4 h-4 md:h-6 md:w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg>
                                </div>
                                <div class="ml-3">
                                    <p class="font-semibold">Register</p>
                                    <p class="mt-2 text-sm">Create an account</p>
                                </div>
                                </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>    
            </nav>
        </div>
    </div>
  <div class="hidden p-1 bg-white border-b shadow-xs md:flex">
      <div class="flex justify-center w-screen mr-8 md:flex">
        <div class="items-center mx-8 text-lg font-medium text-gray-800 md:flex">Categories</div>
          @foreach (App\Category::all() as $category)
            <a class="px-4 py-2 m-2 text-center text-gray-800 bg-gray-200 rounded hover:bg-gray-400" 
            href="{{ route('products.index', ['categorie' => $category->slug]) }}">
                {{ $category->name }}
            </a>     
          @endforeach
      </div>
  </div>
</div>
