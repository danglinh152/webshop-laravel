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
    public function getVoucherPage()
    {
        return view('admin.voucher.show-voucher');
    }
    public function addVoucherPage()
    {
        return view('admin.voucher.add-voucher');
    }
    public function updateVoucherPage()
    {
        return view('admin.voucher.update-voucher');
    }
}
