<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductController extends Controller
{
    /**
     * Show the Products Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (request()->categorie) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->categorie);
            })->paginate(10);
        } else {
            $products = Product::with('categories')->paginate(10);
        }

        return view('products.index', [
            'products' => $products,
        ]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $stock = $product->stock === 0 ? 'Not Available' : 'Available';

        return view('products.show', [
            'product' => $product,
            'stock' => $stock,
        ]);
    }
}
