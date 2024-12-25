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
        $revenue = DB::table('order')->where('status', '!=', 'Cancelled')->sum('payment_cost');
        $user_count = DB::table('users')->count();
        $sale = DB::table('order')->count();
        $completed = DB::table('order')->where('status', 'Completed')->count();

        return view('admin.dashboard.dashboard', [
            'revenue' => $revenue,
            'user_count' => $user_count,
            'sale' => $sale,
            'completed' => $completed,
        ]);
    }


    // public function dashboard(Request $request)
    // {
    //     $user_email = $request->email;
    //     $user_password = md5($request->password);
    //     $result = DB::table('users')->where('user_email', $user_email)->where('user_password', $user_password)->first();
    //     if ($result) {
    //         if ($result->role == 'admin') {
    //             Session::put('admin_name', $result->user_first_name . ' ' . $result->user_last_name);
    //             Session::put('admin_id', $result->user_id);
    //             Session::put('image', asset('public/backend/users-images/' . $result->user_image)); // Use url() instead of asset()
    //             return Redirect::to('/admin/dashboard');
    //         } else {
    //             // client
    //             Session::put('user_name', $result->user_first_name . ' ' . $result->user_last_name);
    //             Session::put('user_id', $result->user_id);
    //             Session::put('ranking', $result->dtl);
    //             Session::put('image', asset('public/backend/users-images/' . $result->user_image)); // Use url() instead of asset()
    //             return Redirect::to('/');
    //         }
    //     } else {
    //         Session::put('err_msg', "Mật khẩu hoặc tài khoản sai! Vui lòng nhập lại!");
    //         return Redirect::to('/login');
    //     }
    // }

    public function getInfoPage()
    {
        $admin_id = Session::get('admin_id');
        $user = DB::table('users')->where('user_id', $admin_id)->first();
        return view('admin.dashboard.information')->with('user', $user);
    }

    public function updateInfo(Request $request)
    {
        $admin_id = Session::get('admin_id');
        $data = array();
        $data['user_last_name'] = $request->last_name;
        $data['user_first_name'] = $request->first_name;
        $data['user_email'] = $request->email;
        $data['user_phone'] = $request->phone;
        $data['user_address'] = $request->address;
        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('backend/users-images'), $fileName);
            $data['user_image'] = $fileName;
        } else {
            $data['user_image'] = $request->input('user_image_value');
        }
        $check = DB::table('users')->where('user_id', $admin_id)->update($data);
        if ($check) {
            $admin_name = $data['user_first_name'] . ' ' . $data['user_last_name'];
            Session::put('admin_name', $admin_name);
            Session::put('image', asset('public/backend/users-images/' . $data['user_image']));
            return response()->json(['success' => true, 'message' => 'Cập nhật thông tin thành công!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Cập nhật thông tin thất bại!']);
        }
    }

    public function updatePassword(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6',
        ]);
        $admin_id = Session::get('admin_id');
        $user = DB::table('users')->where('user_id', $admin_id)->first();
        $user_password = md5($request->current_password);
        // Kiểm tra mật khẩu hiện tại
        if ($user_password != $user->user_password) {
            return response()->json(['success' => false, 'message' => 'Mật khẩu hiện tại không đúng!']);
        }

        // Cập nhật mật khẩu mới
        $result = DB::table('users')->where('user_id', $admin_id)->update(['user_password' => md5($request->new_password)]);
        if ($result)
            return response()->json(['success' => true, 'message' => 'Cập nhật mật khẩu thành công!']);
        else return response()->json(['success' => false, 'message' => 'Cập nhật mật khẩu không thành công!']);
    }

    public function logout(Request $request)
    {
        Session::put('user_name', null);
        Session::put('admin_id', null);
        Session::put('user_id', null);
        return Redirect::to('/login');
    }
}
