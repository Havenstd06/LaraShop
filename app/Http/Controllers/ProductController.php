<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

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
            })->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $products = Product::with('categories')->orderBy('created_at', 'DESC')->paginate(10);
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

    /**
     * Search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        request()->validate([
            'search' => 'required|min:3',
        ]);
        $r = request()->input('search');

        $products = Product::where('title', 'like', "%$r%")
                ->orWhere('subtitle', 'like', "%$r%")
                ->orWhere('description', 'like', "%$r%")
                ->paginate(6);

        return view('products.search')->with('products', $products);
    }
}
