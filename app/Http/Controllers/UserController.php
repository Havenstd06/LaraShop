<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function orders()
    {
        $user = auth()->user();

        return view('user.orders', [
            'user' => $user,
        ]);
    }
}
