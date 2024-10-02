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

    public function getCartPage()
    {
        return view('client.cart.show');
    }
    
    public function addToCart(Request $request, $product_id)
    {
        $user_id = Session::get('user_id');
        if ($user_id) {
            $user_cart = DB::table('cart')->where('user_id', $user_id)->first();
            if ($user_cart) {
                $product = DB::table('cart_detail')->where('product_id', $product_id )->where('cart_id', $user_cart->cart_id)->first();
                if($product){
                    $quantity = $product->quantity + 1;
                    DB::table('cart_detail')->where('product_id', $product_id)->where('cart_id', $user_cart->cart_id)->update(['quantity' => $quantity]);
                    Session::put('message', 'Đã thêm sản phẩm vào giỏ hàng.');
                    return Redirect::to('/cart');
                } else {
                    $data['cart_id'] = $user_cart->cart_id;
                    $data['product_id'] = $product_id;
                    $data['quantity'] = 1;
                    DB::table('cart_detail')->insert($data);
                    Session::put('message', 'Đã thêm sản phẩm vào giỏ hàng.');
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
                Session::put('message', 'Đã thêm sản phẩm vào giỏ hàng.');
                return Redirect::to('/cart');
            }
        }
        else{
            Session::put('err_msg', 'Bạn cần đăng nhập để truy cập trang này!');
            return Redirect::to('/login');
        }
    }
}
