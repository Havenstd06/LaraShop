@extends('layouts.app')

@section('content')

<div class="flex justify-center">
  <div class="max-w-xs my-10 mr-0 overflow-hidden bg-white rounded-lg shadow-lg md:mr-4">
        <div class="px-4 py-2">
            <div class="my-2">
                @if ($stock === 'Available')
                    <span class="px-2 py-1 mr-2 text-xs text-white bg-blue-700 rounded-lg">{{ $stock }}</span>
                @else
                    <span class="px-2 py-1 mr-2 text-xs text-white bg-red-600 rounded-lg">{{ $stock }}</span>
                @endif
                @foreach ($product->categories as $category)
                    <a href="{{ route('products.index', ['categorie' => $category->slug]) }}">
                        <span class="text-sm text-blue-500">
                            {{ $category->name }}{{ $loop->last ? '' : ', ' }}
                        </span>
                    </a>    
                @endforeach
            </div>
          <h1 class="text-xl font-bold text-gray-900 uppercase">{{ $product->title }}</h1>
          <p class="mt-2 text-sm text-gray-600">{!! $product->description !!}</p>
        </div>
        <img class="object-cover w-full h-56 mt-2" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
        @if ($product->images)
            @foreach (json_decode($product->images, true) as $image)
            <img class="object-cover w-full h-32 mt-2" src="{{ asset('storage/' . $image) }}" alt="{{ $product->title }}">
            @endforeach
        @endif
        <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
            <h1 class="text-xl font-bold text-gray-200">{{ $product->getPrice() }}</h1>
            @if ($stock === 'Available')
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="px-3 py-1 text-sm font-semibold text-gray-900 bg-gray-200 rounded">
                    Add to card
                </button>
            </form>
            @else
            <button class="px-3 py-1 text-sm font-semibold text-gray-900 bg-gray-200 rounded cursor-not-allowed" disabled>
                Out of stock
            </button>
            @endif
        </div>
    </div>
</div>

@endsection