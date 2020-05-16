@extends('layouts.app')

@section('title')
<title>{{ config('app.name', 'Laravel') }} — Cart</title>
@endsection

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-3/5">
    @if (Cart::count() > 0)
    <div class="flex-1">
      <table class="w-full text-sm md:text-base" cellspacing="0">
        <thead>
          <tr class="h-12 uppercase">
            <th class="hidden md:table-cell"></th>
            <th class="text-left">Product</th>
            <th class="text-right">
              <span class="lg:hidden" title="Quantity">Qtd</span>
              <span class="hidden lg:inline">Quantity</span>
            </th>
            <th class="hidden text-right md:table-cell">Unit price</th>
            <th class="text-right">Total price</th>
          </tr>
        </thead>
        <tbody>
          @foreach (Cart::content() as $product)
          <tr>
            <td class="hidden w-24 pb-4 md:table-cell">
              <a href="{{ route('products.show', $product->model->slug) }}">
                <img src="{{ asset('storage/' . $product->model->image) }}" class="rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <p class="mb-2 md:ml-4">{{ $product->model->title }}</p>
              <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                  @csrf
                  @method('DELETE')
                <button type="submit" class="text-gray-700 md:ml-4">
                  <small>(Remove item)</small>
                </button>
              </form>
            </td>
            <td class="justify-end md:flex md:mt-10">
            <div class="w-20 h-10">
              <div class="relative flex flex-row w-full h-8">
              <input type="number" name="qty" id="qty" data-id="{{ $product->rowId }}" data-stock="{{ $product->model->stock }}" value="{{ $product->qty }}" 
                class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
              </div>
            </div>

            </td>
            <td class="hidden text-right md:table-cell">
              <span class="font-medium">
                {{ $product->model->getPrice() }}
              </span>
            </td>
            <td class="text-right">
              <span class="font-medium">
                {{ getPrice($product->subtotal()) }}
              </span>
            </td>
          </tr> 
          @endforeach
        </tbody>
      </table>
      <hr class="pb-6 mt-6">
      <div class="my-4 mt-6 -mx-2 md:flex">
        <div class="md:px-2 md:w-1/2">
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Coupon Code</h1>
          </div>
          <div class="p-4">
            <p class="mb-4 italic">If you have a coupon code, please enter it in the box below</p>
            <div class="justify-center md:flex">
              <div class="flex items-center w-full h-12 pl-3 bg-white bg-gray-100 border rounded-full">
                <input type="coupon" name="coupon" id="coupon" placeholder="Apply coupon"
                      class="w-full bg-gray-100 outline-none appearance-none focus:outline-none active:outline-none"/>
                <button type="submit" class="flex items-center px-2 py-1 mr-1 text-white bg-gray-800 rounded-full outline-none md:px-8 hover:bg-gray-700 focus:outline-none active:outline-none">
                  <svg aria-hidden="true" data-prefix="fas" data-icon="gift" class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z"/></svg>
                  <span class="font-medium">Apply coupon</span>
                </button>
              </div>
            </div>
          </div>
          <div class="p-4 mt-6 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Instruction for seller</h1>
          </div>
          <div class="p-4">
            <p class="mb-4 italic">If you have some information for the seller you can leave them in the box below</p>
            <textarea class="w-full h-24 p-2 bg-gray-100 rounded"></textarea>
          </div>
        </div>
        <div class="md:px-2 md:w-1/2">
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Order Details</h1>
          </div>
          <div class="p-4">
            <p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you have entered</p>
            <div class="mt-4">
              <div class="flex justify-between border-b">
                <div class="px-4 py-2 m-2 text-xl font-bold text-center text-gray-800">
                  Subtotal
                </div>
                <div class="px-4 py-2 m-2 text-lg font-bold text-center text-gray-900">
                  {{ getPrice(Cart::subtotal()) }}
                </div>
              </div>
              <div class="flex justify-between pt-4 border-b">
                <div class="px-4 py-2 m-2 text-xl font-bold text-center text-gray-800">
                  Tax
                </div>
                <div class="px-4 py-2 m-2 text-lg font-bold text-center text-gray-900">
                  {{ getPrice(Cart::tax()) }}
                </div>
              </div>
              <div class="flex justify-between pt-4 border-b">
                <div class="px-4 py-2 m-2 text-xl font-bold text-center text-gray-800">
                  Total
                </div>
                <div class="px-4 py-2 m-2 text-lg font-bold text-center text-gray-900">
                  {{ getPrice(Cart::total()) }}
                </div>
              </div>
              <a href="{{ route('checkout.index') }}">
                <button class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                  <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                  <span class="ml-2 mt-5px">Procceed to checkout</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @else
    <p>
      Your shopping cart is empty.
    </p>
    @endif
  </div>
</div>
@endsection

@section('extra-js')

<script>
    var qty = document.querySelectorAll('#qty');
    Array.from(qty).forEach((element) => {
        element.addEventListener('change', function () {
            var rowId = element.getAttribute('data-id');
            var stock = element.getAttribute('data-stock');
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');  
            fetch(`/cart/${rowId}`,
                {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": token
                    },
                    method: 'PATCH',
                    body: JSON.stringify({
                        qty: this.value,
                        stock: stock
                    })
            }).then((data) => {
                console.log(data);
                location.reload();
            }).catch((error) => {
                console.log(error);
            });
        });
    }); 
</script>

@endsection