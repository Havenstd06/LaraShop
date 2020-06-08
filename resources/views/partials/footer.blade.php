<footer class="text-gray-200 bg-gray-800">
  <div class="items-center justify-center max-w-xl mx-auto overflow-hidden md:flex">
    <ul class="flex items-center p-0 text-sm text-gray-700 list-none sm:justify-center">
      <li> 
        <a href="{{ route('home') }}" class="w-32 mr-4">
          <img src="{{ asset('/img/logos/cover-new.png') }}" class="w-64 mt-4 rounded" alt="logo">
        </a>
      </li>
      <li><a href="{{ route('products.index') }}" class="px-3 text-gray-200 no-underline">Product</a></li>
      <li><a href="{{ route('cart.index') }}" class="px-3 text-gray-200 no-underline">Cart</a></li>
      <li><a href="#" class="px-3 text-gray-200 no-underline">Contact</a></li>
    </ul>
    <p class="px-3 text-xs text-center text-gray-500"> ©{{ date('Y') }} {{ config('app.name', 'Laravel') }}.<br>All rights reserved.</p>
  </div>
</footer>