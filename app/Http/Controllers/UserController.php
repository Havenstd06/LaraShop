<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('customer.index', [
            'user' => $user,
        ]);
    }
}
