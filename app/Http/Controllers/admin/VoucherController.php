<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class VoucherController extends Controller
{
    public function showVoucherPage()
    {
        $all_voucher = DB::table('voucher')->orderby('voucher_id', 'desc')->get();
        $manager_voucher = view('admin.voucher.show-voucher')->with('all_voucher', $all_voucher);
        return view(view: 'admin.layout.admin-layout')->with('admin.voucher.show-voucher', @$manager_voucher);
    }
    public function addVoucherPage()
    {
        return view('admin.voucher.add-voucher');
    }
    public function updateVoucherPage()
    {
        return view('admin.voucher.update-voucher');
    }

    public function save_voucher(Request $request)
    {
        $data = array();
        $data['voucher_name'] = $request->voucher_name;
        $data['voucher_desc'] = $request->voucher_desc;
        $data['discount_value'] = ($request->discount_value) / 100;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;
        DB::table('voucher')->insert($data);
        Session::put('message', 'Thêm voucher thành công.');
        return Redirect::to('admin/voucher');
    }

    public function edit_voucher($voucher_id)
    {
        $get_vou = DB::table('voucher')->where('voucher_id', $voucher_id)->get();
        return view(view: 'admin.voucher.update-voucher')->with('get_vou', $get_vou);
    }

    public function update_voucher(Request $request, $voucher_id)
    {

        $data = array();
        $data['voucher_name'] = $request->voucher_name;
        $data['voucher_desc'] = $request->voucher_desc;
        $data['discount_value'] = $request->discount_value;
        $data['start_date'] = $request->start_date;
        $data['end_date'] = $request->end_date;

        $check = DB::table('voucher')->where('voucher_id', $voucher_id)->update($data);
        if (isset($check)) {
            Session::put('message', 'Cập nhật Voucher thành công.');
        } else Session::put('message', 'Cập nhật Voucher thất bại.');
        return Redirect::to('admin/voucher');


        $check = DB::table('voucher')->where('voucher_id', $voucher_id)->update($data);
        if (isset($check)) {
            Session::put('message', 'Cập nhật Voucher thành công.');
        } else Session::put('message', 'Cập nhật Voucher thất bại.');
        return Redirect::to('admin/voucher');
    }

    public function delete_voucher($voucher_id)
    {
        DB::table('voucher')->where('voucher_id', $voucher_id)->delete();
        Session::put('message', 'Xóa voucher thành công');
        return Redirect::to('admin/voucher');
    }
}
