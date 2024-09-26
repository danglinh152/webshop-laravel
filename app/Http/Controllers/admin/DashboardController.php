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
        $user_email = $request->email;
        $user_password = md5($request->password);
        $result = DB::table('tbl_user')->where('user_email', $user_email)->where('user_password', $user_password)->first();
        if ($result) {
            if ($result->role == 'admin') {
                Session::put('admin_name', $result->user_first_name . ' ' . $result->user_last_name);
                Session::put('admin_id', $result->user_id);
                Session::put('image', asset('public/backend/users-images/' . $result->user_image)); // Use url() instead of asset()
                return Redirect::to('/admin/dashboard');
            } else {
                // client
                Session::put('user_name', $result->user_first_name . ' ' . $result->user_last_name);
                Session::put('user_id', $result->user_id);
                Session::put('image', asset('public/backend/users-images/' . $result->user_image)); // Use url() instead of asset()
                return Redirect::to('/');
            }
        } else {
            Session::put('err_msg', "Mật khẩu hoặc tài khoản sai! Vui lòng nhập lại!");
            return Redirect::to('/login');
        }
    }

    public function logout(Request $request)
    {
        Session::put('user_name', null);
        Session::put('user_id', null);
        return Redirect::to('/login');
    }
}
