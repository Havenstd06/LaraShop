@extends('layouts.app')

@section('content')

<div class="flex justify-center mt-20">
 @foreach (Auth()->user()->orders as $order)
<div class="py-6">
  <div class="flex max-w-md overflow-hidden bg-white rounded-lg shadow-lg">
    {{-- <div class="w-1/3 bg-cover" style="background-image: url('{{ asset('storage/' . $order->model->image) }}">
    </div>  --}}
    <div class="w-2/3 p-4">
    <h1 class="text-2xl font-bold text-gray-900">Order #{{ $order->id }}</h1>
    <h1 class="text-lg font-semibold text-gray-900">Product(s) list</h1>
    @foreach (unserialize($order->products) as $product)
    <p class="mt-2 text-sm text-gray-600"> Product Name : {{ $product[0] }}</p>
    <p class="mt-2 text-sm text-gray-600"> Price : {{ getPrice($product[1]) }}</p>
    <p class="mt-2 text-sm text-gray-600"> Quantity : {{ $product[2] }}</p>
    <div>-</div>
    @endforeach
      <div class="flex mt-2 item-center">
      <h3 class="font-medium">Order Created at&nbsp;</h3>
      <span>{{ Carbon\Carbon::parse($order->payment_created_at)->format('m/d/Y H:m') }}</span>
      </div>
      <div class="flex justify-between mt-3 item-center">
        <h1 class="text-xl font-bold text-gray-700">{{ getPrice($order->amount) }}</h1>
      </div>
    </div>
  </div>
</div>
 @endforeach
</div>

@endsection