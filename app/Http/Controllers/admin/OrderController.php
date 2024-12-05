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
        return view('admin.order.show-order');
    }
    public function getUpdateOrderPage()
    {
        return view('admin.order.update-order');
    }
}
