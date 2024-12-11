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

    // public function getSuccessPage(Request $request)
    // {
    //     // Retrieve the message query parameter
    //     $message = $request->query('message');

    //     // Check if the message contains "rejected"
    //     if (strpos($message, 'rejected') !== false) {
    //         return view('client.cart.error');  // Redirect to error page
    //     } else {
    //         return view('client.cart.success'); // Redirect to success page
    //     }
    // }

    public function getCartPage()
    {
        $voucher = DB::table('voucher')->where('quantity', '>', 0)->get();
        $user_id = Session::get('user_id');
        $cart_detail = DB::table('cart_detail')->join('product', 'product.product_id', '=', 'cart_detail.product_id')->join('cart', 'cart.cart_id', '=', 'cart_detail.cart_id')->where('user_id', $user_id)->where('quantity', '>', 0)->get();
        return view('client.cart.show')->with('cart', $cart_detail)->with('voucher', $voucher);
    }
    public function getCheckoutPage(Request $request)
    {
        $user_id = Session::get('user_id');
        // Retrieve selected product IDs and quantities from the request
        $selectedProductIds = $request->input('selected_products', []);
        $quantities = $request->input('quantities', []);

        // Ensure that the quantities correspond to the selected products
        if (count($selectedProductIds) !== count($quantities)) {
            // Handle error: Number of selected products must match the number of quantities
            return redirect()->route('cart')->with('error', 'Product count mismatch.');
        }
        // Get cart details for the selected products
        $cart_detail = DB::table('cart_detail')
            ->join('product', 'product.product_id', '=', 'cart_detail.product_id')
            ->join('cart', 'cart.cart_id', '=', 'cart_detail.cart_id')
            ->where('user_id', $user_id)
            ->whereIn('cart_detail.product_id', $selectedProductIds) // Filter by selected product IDs
            ->get();

        // Create an associative array for easy access to quantities
        $quantitiesAssoc = array_combine($selectedProductIds, $quantities);

        // Attach the quantities to the cart details
        foreach ($cart_detail as $item) {
            $item->quantity = isset($quantitiesAssoc[$item->product_id]) ? $quantitiesAssoc[$item->product_id] : 0;
        }

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
                    $cartCount = DB::table('cart_detail')->where('cart_id', $user_cart->cart_id)->count();
                    Session::put('cartCount', $cartCount);
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
                Session::put('cartCount', 1);
                return Redirect::to('/cart');
            }
        } else {
            Session::put('err_msg', 'Bạn cần đăng nhập để truy cập trang này!');
            return Redirect::to('/login');
        }
    }

    public function addToCartInDetail(Request $request, $product_id, $quantityParam)
    {
        $user_id = Session::get('user_id');
        if ($user_id) {
            $user_cart = DB::table('cart')->where('user_id', $user_id)->first();
            // $quantity = DB::table('cart_detail')->join('cart', 'cart.cart_id', '=', 'cart_detail.cart_id')->where('user_id', $user_id)->count('product_id');
            if ($user_cart) {
                $product = DB::table('cart_detail')->where('product_id', $product_id)->where('cart_id', $user_cart->cart_id)->first();
                if ($product) {
                    $quantity = $product->quantity + $quantityParam;
                    DB::table('cart_detail')->where('product_id', $product_id)->where('cart_id', $user_cart->cart_id)->update(['quantity' => $quantity]);
                    return Redirect::to('/cart');
                } else {
                    $data['cart_id'] = $user_cart->cart_id;
                    $data['product_id'] = $product_id;
                    $data['quantity'] = 1;
                    DB::table('cart_detail')->insert($data);
                    $cartCount = DB::table('cart_detail')->where('cart_id', $user_cart->cart_id)->count();
                    Session::put('cartCount', $cartCount);
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
                Session::put('cartCount', 1);
                return Redirect::to('/cart');
            }
        } else {
            Session::put('err_msg', 'Bạn cần đăng nhập để truy cập trang này!');
            return Redirect::to('/login');
        }
    }



    public function deleteCart($product_id)
    {
        DB::table('cart_detail')->where('product_id', $product_id)->delete();
        $cartCount = Session::get('cartCount') - 1;
        Session::put('cartCount', $cartCount);
        Session::put('message', 'Xóa sản phẩm khỏi giỏ hàng thành công');
        return Redirect::to('/cart');
    }

    public function incrementQuantity(Request $request)
    {
        $cartId = $request->input('cart_id');
        $productId = $request->input('product_id');

        // Find the cart detail and increment quantity
        $cartDetail = DB::table('cart_detail')->where('cart_id', $cartId)->where('product_id', $productId)->first();

        if ($cartDetail) {
            DB::table('cart_detail')->where('cart_id', $cartId)->where('product_id', $productId)->increment('quantity', 1);

            // Return new quantity and price
            return response()->json([
                'new_quantity' => $cartDetail->quantity + 1,
                'price' => $cartDetail->product_price,
                'index' => $request->input('index') // Pass index for updating totals
            ]);
        }

        return response()->json(['error' => 'Product not found'], 404);
    }

    public function decrementQuantity(Request $request)
    {
        $cartId = $request->input('cart_id');
        $productId = $request->input('product_id');

        // Find the cart detail
        $cartDetail = DB::table('cart_detail')->where('cart_id', $cartId)->where('product_id', $productId)->first();

        if ($cartDetail && $cartDetail->quantity > 1) {
            DB::table('cart_detail')->where('cart_id', $cartId)->where('product_id', $productId)->decrement('quantity', 1);

            // Return new quantity and price
            return response()->json([
                'new_quantity' => $cartDetail->quantity - 1,
                'price' => $cartDetail->product_price,
                'index' => $request->input('index') // Pass index for updating totals
            ]);
        }

        return response()->json(['error' => 'Product not found or quantity is already 1'], 404);
    }
}
