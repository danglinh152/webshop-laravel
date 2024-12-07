<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    public function getOrderPage()
    {
        $all_orders = DB::table('order')->join('users', 'users.user_id', '=', 'order.user_id')->orderby('order_id', 'asc')->get();
        return view('admin.order.show-order')->with('all_orders', $all_orders);
    }

    public function getUpdateOrderPage($order_id)
    {
        $get_order = DB::table('order')->where('order_id', $order_id)->first();
        return view(view: 'admin.order.update-order')->with('get_order', $get_order);
    }

    public function update_order(Request $request, $order_id)
    {
        $data = array();
        $data['order_id'] = $order_id;
        $data['receiverName'] = $request->receiverName;
        $data['receiverPhone'] = $request->receiverPhone;
        $data['receiverAddress'] = $request->receiverAddress;
        DB::table('order')->where('order_id', $order_id)->update($data);
        Session::put('message', 'Cập nhật đơn hàng thành công.');
        return Redirect::to('admin/order');
    }

    public function delete_order($order_id) {
        DB::table('order')->where('order_id', $order_id)->delete();
        Session::put('message', 'Xóa đơn hàng thành công.');
        return Redirect::to('admin/order');
    }
}
