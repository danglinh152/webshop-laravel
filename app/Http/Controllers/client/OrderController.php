<?php

namespace App\Http\Controllers\admin;

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
        $data_order['order_total'] = $request->total;
        $data_order['receiverName'] = 'receiverName';
        $data_order['receiverPhone'] = $_POST["receiverPhone"];
        $data_order['receiverAddress'] = $_POST["receiverAddress"];
        $data_order['receiverNote'] = $_POST["receiverNote"];

        // $data_order['phone'] = $request->receiverPhone;
        // $data_order['address'] = $request->receiverAddress;
        // $data_order['note'] = $request->receiverNote;

        $orderID = DB::table('order')->insertGetId($data_order);

        $data_order_detail = array();
        $data_order_detail["order_id"] = $orderID;
        foreach($cart as $key => $cart_value){
            $data_order_detail["quantity"] = $cart->quantity;
            $data_order_detail["price"] = $cart->price;
            $data_order_detail["product_id"] = $cart->product_id;
            DB::table('order_detail')->insert($data_order_detail);
        }

        Session::put('message', 'Đặt đơn hàng thành công.');
        return Redirect::to('client/cart');
    }
}
