<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function getCheckOutPage()
    {
        return view('client.cart.checkout');
    }
            

    public function getCartPage()
    {
        $user_id = Session::get('user_id');
        $cart_detail = DB::table('cart_detail')->join('product', 'product.product_id', '=', 'cart_detail.product_id')->join('cart', 'cart.cart_id', '=', 'cart_detail.cart_id')->where('user_id', $user_id)->get();
        return view('client.cart.show')->with('cart', $cart_detail);
    }

    public function addToCart(Request $request, $product_id)
    {
        $user_id = Session::get('user_id');
        if ($user_id) {
            $user_cart = DB::table('cart')->where('user_id', $user_id)->first();
            if ($user_cart) {
                $product = DB::table('cart_detail')->where('product_id', $product_id)->where('cart_id', $user_cart->cart_id)->first();
                if ($product) {
                    $quantity = $product->quantity + 1;
                    DB::table('cart_detail')->where('product_id', $product_id)->where('cart_id', $user_cart->cart_id)->update(['quantity' => $quantity]);
                    return Redirect::to('/cart');
                } else {
                    $data['cart_id'] = $user_cart->cart_id;
                    $data['product_id'] = $product_id;
                    $data['quantity'] = 1;
                    DB::table('cart_detail')->insert($data);
                    return Redirect::to('/cart');
                }
            } else {
                $data1['user_id'] = $user_id;
                DB::table('cart')->insert($data1);
                $cart_id = DB::table('cart')->where('user_id', $user_id)->first();
                $data['cart_id'] = $cart_id->cart_id;
                $data['product_id'] = $product_id;
                $data['quantity'] = 1;
                DB::table('cart_detail')->insert($data);
                return Redirect::to('/cart');
            }
        } else {
            Session::put('err_msg', 'Bạn cần đăng nhập để truy cập trang này!');
            return Redirect::to('/login');
        }
    }
}
