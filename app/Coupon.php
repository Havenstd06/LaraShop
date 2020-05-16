<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function discount($subtotal)
    {
        return $subtotal * ($this->percent_off / 100);
    }

    public function couponSubtotal()
    {
        return Cart::subtotal() - request()->session()->get('coupon')['discount'];
    }

    public function taxSubtotal()
    {
        return (Cart::subtotal() - request()->session()->get('coupon')['discount']) * config('cart.tax') / 100;
    }

    public function couponTotal()
    {
        return (Cart::subtotal() - request()->session()->get('coupon')['discount']) + ((Cart::subtotal() - request()->session()->get('coupon')['discount']) * config('cart.tax') / 100);
    }
}
