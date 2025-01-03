<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;;

use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function getSuccessPage(Request $request)
    {
        // Retrieve the full query string
        $queryString = $request->getQueryString();

        // Check if the query string contains "resultCode=1006"
        if (strpos($queryString, 'resultCode=1006') !== false) {
            return view('client.cart.error');  // Redirect to error page
        } else {
            return view('client.cart.success'); // Redirect to success page
        }
    }



    public function getCartPage()
    {
        $user_id = Session::get('user_id');
        $user = DB::table('users')->where('user_id', $user_id)->first();
        if ($user) {
            $rank_number = 0;
            if ($user->ranking == 'SILVER') {
                $rank_number = 1;
            } elseif ($user->ranking == 'GOLD') {
                $rank_number = 2;
            } elseif ($user->ranking == "DIAMOND") {
                $rank_number = 3;
            }
            $voucher = DB::table('voucher')->where('quantity', '>', 0)->where('rank', '<=', $rank_number)->get();
            $cart_detail = DB::table('cart_detail')->join('product', 'product.product_id', '=', 'cart_detail.product_id')->join('cart', 'cart.cart_id', '=', 'cart_detail.cart_id')->where('user_id', $user_id)->where('quantity', '>', 0)->get();
            return view('client.cart.show')->with('cart', $cart_detail)->with('voucher', $voucher);
        } else {
            return view('admin.auth.login');
        }
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
                    return response()->json(['success' => true, 'message' => 'Thêm vào giỏ hàng thành công!'], 200);
                } else {
                    $data['cart_id'] = $user_cart->cart_id;
                    $data['product_id'] = $product_id;
                    $data['quantity'] = 1;
                    DB::table('cart_detail')->insert($data);
                    $cartCount = DB::table('cart_detail')->where('cart_id', $user_cart->cart_id)->where('quantity', '>', 0)->count();
                    Session::put('cartCount', $cartCount);
                    return response()->json(['success' => true, 'message' => 'Thêm vào giỏ hàng thành công!'], 200);
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
                return response()->json(['success' => true, 'message' => 'Thêm vào giỏ hàng thành công!'], 200);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để truy cập trang này!'], 401);
        }
    }

    public function addToCartInDetail(Request $request, $product_id, $quantityParam)
    {
        $user_id = Session::get('user_id');

        if ($user_id) {
            $user_cart = DB::table('cart')->where('user_id', $user_id)->first();

            if ($user_cart) {
                // Check if the product is already in the cart
                $product = DB::table('cart_detail')->where('product_id', $product_id)
                    ->where('cart_id', $user_cart->cart_id)
                    ->first();

                if ($product) {
                    // Update quantity if the product is already in the cart
                    $quantity = $product->quantity + $quantityParam;
                    DB::table('cart_detail')->where('product_id', $product_id)
                        ->where('cart_id', $user_cart->cart_id)
                        ->update(['quantity' => $quantity]);
                } else {
                    // Insert the new product with the specified quantity
                    $data['cart_id'] = $user_cart->cart_id;
                    $data['product_id'] = $product_id;
                    $data['quantity'] = $quantityParam; // Use the quantity from the request
                    DB::table('cart_detail')->insert($data);
                }

                // Update the cart count in the session
                $cartCount = DB::table('cart_detail')->where('cart_id', $user_cart->cart_id)->where('quantity', '>', 0)->count();
                Session::put('cartCount', $cartCount);
                return response()->json(['success' => true, 'message' => 'Thêm vào giỏ hàng thành công!'], 200);
            } else {
                // Create a new cart if it doesn't exist
                $data1['user_id'] = $user_id;
                DB::table('cart')->insert($data1);
                $cart_id = DB::table('cart')->where('user_id', $user_id)->first();

                // Insert the product with the specified quantity
                $data['cart_id'] = $cart_id->cart_id;
                $data['product_id'] = $product_id;
                $data['quantity'] = $quantityParam; // Use the quantity from the request
                DB::table('cart_detail')->insert($data);

                Session::put('cartCount', 1); // Set initial cart count
                return response()->json(['success' => true, 'message' => 'Thêm vào giỏ hàng thành công!'], 200);
            }
        } else {
            Session::put('err_msg', 'Bạn cần đăng nhập để truy cập trang này!');
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập để truy cập trang này!'], 401);
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
