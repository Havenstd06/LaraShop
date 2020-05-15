@extends('layouts.app')

@section('title')
<title>{{ config('app.name', 'Laravel') }} — Product</title>
@endsection

@section('content')

<div class="flex justify-center">
  <div class="grid grid-flow-row grid-cols-5 grid-rows-2 gap-4">
    @foreach ($products as $product)
        <div class="max-w-xs my-5 mr-0 overflow-hidden bg-white rounded-lg shadow-lg md:mr-2">
            <div class="px-4 py-2">
                <div class="my-2">
                    @foreach ($product->categories as $category)
                        <a href="{{ route('products.index', ['categorie' => $category->slug]) }}">
                            <span class="text-sm text-blue-600">
                                {{ $category->name }}{{ $loop->last ? '' : ', ' }}
                            </span>
                        </a>    
                    @endforeach
                </div>
                <h1 class="mt-3 text-xl font-bold text-gray-900 uppercase">{{ $product->title }}</h1>
                <p class="mt-2 text-sm text-gray-600">{{ $product->subtitle }}</p>
            </div>
            <img class="object-cover w-full h-56 mt-2" src="{{ $product->image }}" alt="{{ $product->title }}">
            <div class="flex items-center justify-between px-4 py-2 bg-gray-900">
                <h1 class="text-xl font-bold text-gray-200">{{ $product->getPrice() }}</h1>
                <a href="{{ route('products.show', $product->slug) }}" class="px-3 py-1 text-sm font-semibold text-gray-900 bg-gray-200 rounded">
                    More
                </a>
            </div>
        </div>
    @endforeach
  </div>
</div>
<div class="m-4">
{{ $products->appends(request()->input())->links()  }}
</div>
@endsection