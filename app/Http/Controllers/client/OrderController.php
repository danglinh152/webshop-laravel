<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    public function save_order(Request $request)
    {
        $data_order = array();
        $cart = session('cart');
        $data_order['user_id'] = Session::get('user_id');
        $data_order['payment_cost'] = $request->total;
        $data_order['shipping_cost'] = 20000;
        $data_order['receiverName'] = $_POST["receiverName"];
        $data_order['receiverPhone'] = $_POST["receiverPhone"];
        $data_order['receiverAddress'] = $_POST["receiverAddress"];
        $data_order['status'] = "Pending";
        $data_order['receiverNote'] = $_POST["receiverNote"];

        $orderID = DB::table('order')->insertGetId($data_order);

        $data_order_detail = array();
        $data_order_detail["order_id"] = $orderID;
        foreach($cart as $key => $cart_value){
            $data_order_detail["quantity"] = $cart[$key]->quantity;
            $data_order_detail["order_detail_price"] = $cart[$key]->product_price * $cart[$key]->quantity;
            $data_order_detail["product_id"] = $cart[$key]->product_id;

            DB::table('order_detail')->insert($data_order_detail);
        }

        Session::put('message', 'Đặt đơn hàng thành công.');
        return Redirect::to('client/cart');
    }
}
