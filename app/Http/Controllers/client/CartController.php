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

    public function getSuccessPage(Request $request)
    {
        // Retrieve the message query parameter
        $message = $request->query('message');

        // Check if the message contains "rejected"
        if (strpos($message, 'rejected') !== false) {
            return view('client.cart.error');  // Redirect to error page
        } else {
            return view('client.cart.success'); // Redirect to success page
        }
    }




    public function getCartPage()
    {
        $user_id = Session::get('user_id');
        $cart_detail = DB::table('cart_detail')->join('product', 'product.product_id', '=', 'cart_detail.product_id')->join('cart', 'cart.cart_id', '=', 'cart_detail.cart_id')->where('user_id', $user_id)->get();
        return view('client.cart.show')->with('cart', $cart_detail);
    }

    public function getCheckoutPage(Request $request)
    {
        $user_id = Session::get('user_id');

        // Retrieve selected product IDs from the request
        $selectedProductIds = $request->input('selected_products', []);

        // Get cart details for the selected products
        $cart_detail = DB::table('cart_detail')
            ->join('product', 'product.product_id', '=', 'cart_detail.product_id')
            ->join('cart', 'cart.cart_id', '=', 'cart_detail.cart_id')
            ->where('user_id', $user_id)
            ->whereIn('cart_detail.product_id', $selectedProductIds) // Filter by selected product IDs
            ->get();

        return view('client.cart.checkout')->with('cart', $cart_detail);
    }


    public function addToCart(Request $request, $product_id)
    {
        $user_id = Session::get('user_id');
        if ($user_id) {
            $user_cart = DB::table('cart')->where('user_id', $user_id)->first();
            // $quantity = DB::table('cart_detail')->join('cart', 'cart.cart_id', '=', 'cart_detail.cart_id')->where('user_id', $user_id)->count('product_id');
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
