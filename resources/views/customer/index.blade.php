@extends('layouts.app')

@section('content')

<div class="px-4 mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
  <h1 class="text-2xl font-semibold text-gray-900">Customer</h1>
</div>
<div class="px-4 mx-auto max-w-7xl sm:px-6 md:px-8">
  <div x-data="{ tab: 'index' }">
      <button :class="{ 'active': tab === 'index' }" @click="tab = 'index'">index</button>
      <button :class="{ 'active': tab === 'orders' }" @click="tab = 'orders'">orders</button>

      <div x-show="tab === 'index'">
        My Customer Dashboard
      </div>
      <div x-show="tab === 'orders'">
        @include('customer.orders')
      </div>
  </div>
</div>

@endsection