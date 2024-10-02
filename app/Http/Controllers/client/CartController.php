<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function getCartPage()
    {
        return view('client.cart.show');
    }
    public function getCheckoutPage()
    {
        return view('client.cart.checkout');
    }
}
