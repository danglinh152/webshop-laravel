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

            $user = DB::table('users')->where('user_id', Session::get('user_id'))->get()->first();

            $data = array();

            $data['user_first_name'] = $user->user_first_name;
            $data['user_last_name'] = $user->user_last_name;
            $data['user_email'] = $user->user_email;
            $data['user_password'] = $user->user_password;
            $data['user_phone'] = $user->user_phone;
            $data['user_address'] = $user->user_address;
            $data['role'] = $user->role;
            $data['user_image'] = $user->user_image;

            $data['spending_score'] = $user->spending_score + $request->total;
            if ($user->spending_score + $request->total >= 15000000 && $user->spending_score + $request->total <= 30000000) {
                $data['ranking'] = 'SILVER';
            } else if ($user->spending_score + $request->total > 30000000 && $user->spending_score + $request->total <= 50000000) {
                $data['ranking'] = 'GOLD';
            } else if ($user->spending_score + $request->total > 50000000) {
                $data['ranking'] = 'DIAMOND';
            } else
                $data['ranking'] = 'COPPER';

            DB::table('users')->where('user_id', Session::get('user_id'))->update($data);
            Session::put('ranking', $data['ranking']);
            Session::put('spending_score', $data['spending_score']);
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
