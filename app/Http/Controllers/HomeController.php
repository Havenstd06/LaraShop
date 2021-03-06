<?php

namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $randProducts = Product::inRandomOrder()->take(8)->get();

        return view('home', [
            'randProducts' => $randProducts,
        ]);
    }
}
