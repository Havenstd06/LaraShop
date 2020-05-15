<footer class="px-4 py-6 text-gray-200 bg-gray-800">
  <div class="flex items-center justify-center max-w-xl mx-auto overflow-hidden">
    <ul class="flex items-center p-0 text-sm text-gray-700 list-none">
      <li> 
        <a href="{{ route('home') }}" class="w-32 mr-4">
          <img src="https://img.pizza/292/80" class="" alt="logo">
        </a>
      </li>
      <li><a href="{{ route('products.index') }}" class="px-3 py-2 text-gray-200 no-underline">Product</a></li>
      <li><a href="{{ route('cart.index') }}" class="px-3 py-2 text-gray-200 no-underline">Cart</a></li>
      <li><a href="#" class="px-3 py-2 text-gray-200 no-underline">Contact</a></li>
    </ul>
    <p class="px-3 py-2 text-xs text-gray-500"> ©{{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
  </div>
</footer>