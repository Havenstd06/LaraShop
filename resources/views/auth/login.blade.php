<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
@include('partials.head')


<div class="flex min-h-screen bg-white">
  <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
    <div class="w-full max-w-sm mx-auto">
      <div>
        <a href="{{ route('home') }}">
            <img class="-ml-6 w-128" src="{{ asset('/img/logos/cover-new-y-crop-bg-white.png') }}" alt="Larashop" />
        </a>
        <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
          Sign in to your account
        </h2>
      </div>

      <div class="mt-8">
        <div class="mt-6">
          <form action="{{ route('login') }}" method="POST">
              @csrf
            <div>
              <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                Email address
              </label>
              <div class="mt-1 rounded-md shadow-sm">
                <input @error('email') border-red-500 @enderror id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
              </div>

                @error('email')
                    <p class="mt-4 text-xs italic text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mt-6">
                <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                    Password
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input id="password" type="password" @error('password') border-red-500 @enderror" name="password" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5" />
                </div>

                @error('password')
                    <p class="mt-4 text-xs italic text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }} class="w-4 h-4 text-indigo-600 transition duration-150 ease-in-out form-checkbox" />
                    <label for="remember" class="block ml-2 text-sm leading-5 text-gray-900">
                    Remember me
                    </label>
                </div>

                @if (Route::has('password.request'))
                <div class="text-sm leading-5">
                    <a  href="{{ route('password.request') }}" class="font-medium text-indigo-600 transition duration-150 ease-in-out hover:text-indigo-500 focus:outline-none focus:underline">
                    Forgot your password?
                    </a>
                </div>
                @endif
            </div>

            <div class="mt-6">
              <span class="block w-full rounded-md shadow-sm">
                <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                  Sign in
                </button>
              </span>
            </div>
          </form>

            <div class="relative">
              <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
              </div>
              <div class="relative flex justify-center text-sm leading-5">
                <span class="px-2 text-gray-500 bg-white">
                <a href="{{ route('home') }}">Back to shop</a>
                </span>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="relative flex-1 hidden w-0 lg:block">
    <img class="absolute inset-0 object-cover w-full h-full" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="" />
  </div>
</div>

