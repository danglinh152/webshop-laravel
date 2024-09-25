<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function getUserPage()
    {
        $all_user = DB::table("tbl_user")->orderby('user_id', 'desc')->get();
        return view('admin.user.show-user')->with('all_user', $all_user);
    }
    public function addUserPage()
    {
        return view('admin.user.add-user');
    }

    public function saveUser(Request $request)
    {
        $data = array();
        $data['user_first_name'] = $request->f_name;
        $data['user_last_name'] = $request->l_name;
        $data['user_email'] = $request->email;
        $data['user_password'] = md5($request->password);
        $data['user_phone'] = $request->phone;
        $data['user_address'] = $request->address;
        $data['role'] = $request->role;
        $get_image = $request->file('fileUpload');
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/backend/users-images', $new_image);
            $data['user_image'] = $new_image;
            DB::table('tbl_user')->insert($data);
            return Redirect::to('admin/user');
        } else {
            $data['user_image'] = '';
            DB::table('tbl_user')->insert($data);
            return Redirect::to('admin/user');
        }
    }
    public function updateUserPage($user_id)
    {
        $get_user = DB::table('tbl_user')->where('user_id', $user_id)->get();
        return view(view: 'admin.user.update-user')->with('get_user', $get_user);
    }

    public function update_user(Request $request, $user_id)
    {
        $data = array();
        $data['user_first_name'] = $request->f_name;
        $data['user_last_name'] = $request->l_name;
        $data['user_email'] = $request->email;
        $data['user_password'] = md5($request->password);
        $data['user_phone'] = $request->phone;
        $data['user_address'] = $request->address;
        $data['role'] = $request->role;
        $get_image = $request->file('fileUpload');
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/backend/users-images', $new_image);
            $data['user_image'] = $new_image;
            $check = DB::table('tbl_user')->where('user_id', $user_id)->update($data);
            if (isset($check)) {
                Session::put('message', 'Cập nhật người dùng thành công.');
            } else Session::put('message', 'Cập nhật người dùng thất bại.');
            return Redirect::to('admin/user');
        } else {
            $check = DB::table('tbl_user')->where('user_id', $user_id)->update($data);
            if (isset($check)) {
                Session::put('message', 'Cập nhật người dùng thành công.');
            } else Session::put('message', 'Cập nhật người dùng thất bại.');
            return Redirect::to('admin/user');
        }
    }

    public function delete_user($user_id)
    {
        DB::table('tbl_user')->where('user_id', $user_id)->delete();
        Session::put('message', 'Xóa người dùng thành công');
        return Redirect::to('admin/user');
    }
}
