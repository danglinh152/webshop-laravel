<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    public function save_order(Request $request)
    {
        // Prepare order data
        $data_order = array();
        $cart = session('cart');
        $data_order['user_id'] = Session::get('user_id');
        $data_order['payment_cost'] = $request->total; // Use $request->input('total') if needed
        $data_order['shipping_cost'] = 20000;
        $data_order['receiverName'] = $_POST["receiverName"];
        $data_order['receiverPhone'] = $_POST["receiverPhone"];
        $data_order['receiverAddress'] = $_POST["receiverAddress"];
        $data_order['status'] = "Pending";
        $data_order['receiverNote'] = $_POST["receiverNote"];

        // Create order and get the ID
        $orderID = DB::table('order')->insertGetId($data_order);

        // Prepare order details and update quantities
        foreach ($cart as $cart_value) {
            $data_order_detail = array(
                "order_id" => $orderID,
                "quantity" => $cart_value->quantity,
                "order_detail_price" => $cart_value->product_price * $cart_value->quantity,
                "product_id" => $cart_value->product_id,
            );

            // Insert order detail
            DB::table('order_detail')->insert($data_order_detail);

            // Update the quantity in the cart
            DB::table('cart_detail')->where('cart_id', $cart_value->cart_id)
                ->where('product_id', $cart_value->product_id)
                ->decrement('quantity', $cart_value->quantity); // Decrement quantity by 1
        }

        // Create an Order model instance and populate with order information
        $order_info = new \App\Models\Order;
        $order_info->order_id = $orderID;
        $order_info->payment_cost = $data_order['payment_cost'];
        $order_info->shipping_cost = $data_order['shipping_cost'];
        $order_info->receiverName = $data_order['receiverName'];
        $order_info->receiverPhone = $data_order['receiverPhone'];
        $order_info->receiverAddress = $data_order['receiverAddress'];
        $order_info->status = $data_order['status'];
        $order_info->receiverNote = $data_order['receiverNote'];

        // Store the order info in the session
        Session::put('order_info', $order_info);
        Session::put('message', 'Đặt đơn hàng thành công.');

        return null;
    }
}
