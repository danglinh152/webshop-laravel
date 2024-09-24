<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function showDashboard()
    {
        return view('admin.dashboard.dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->email;
        $admin_password = md5($request->password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/admin/dashboard');
        } else {
            Session::put('err_msg', "Mật khẩu hoặc tài khoản sai! Vui lòng nhập lại!");
            return Redirect::to('/login');
        }
    }

    public function logout(Request $request)
    {
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/login');
    }
}
