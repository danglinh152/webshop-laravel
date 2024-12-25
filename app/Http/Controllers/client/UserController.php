<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Requests;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class UserController extends Controller
{
    // public function showUserPage()
    // {
    //     $all_users = DB::table('users')->orderby('id','desc')->get();
    //     $manager_user = view('admin.user.show-user')->with('all_users', $all_users);
    //     return view(view: 'admin.layout.admin-layout')->with('admin.user.show-user', @$manager_user);

    // }
    public function add_user(Request $request)
    {
        $data = array();
        $data['user_email'] = $request->email;
        $data['user_password'] = md5($request->password);
        $data['user_first_name'] = $request->first_name;
        $data['user_last_name'] = $request->last_name;
        $data['user_address'] = null;
        $data['user_phone'] = null;
        $data['user_image'] = null;
        $data['role'] = 'customer';
        DB::table('users')->insert($data);
        Session::put('err_msg', "Tạo tài khoản thành công!");
        return Redirect::to('/login');
    }

    public function login(Request $request)
    {
        $user_email = $request->email;
        $user_password = md5($request->password);
        $result = DB::table('users')->where('user_email', $user_email)->where('user_password', $user_password)->first();
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
                Session::put('ranking', $result->ranking);
                Session::put('spending_score', $result->spending_score);
                Session::put('image', asset('public/backend/users-images/' . $result->user_image)); // Use url() instead of asset()
                return Redirect::to('/');
            }
        } else {
            Session::put('err_msg', "Mật khẩu hoặc tài khoản sai! Vui lòng nhập lại!");
            return Redirect::to('/login');
        }
    }


    public function logout()
    {
        Session::put('user_id', null);
        Session::put('admin_id', null);
        Session::put('user_name', null);
        return Redirect::to('/login');
    }
    public function updateUser(Request $request)
    {
        $user_id = Session::get('user_id');
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
        $check = DB::table('users')->where('user_id', $user_id)->update($data);
        if ($check) {
            $user_name = $data['user_first_name'] . ' ' . $data['user_last_name'];
            Session::put('user_name', $user_name);
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
        $user_id = Session::get('user_id');
        $user = DB::table('users')->where('user_id', $user_id)->first();
        $user_password = md5($request->current_password);
        // Kiểm tra mật khẩu hiện tại
        if ($user_password != $user->user_password) {
            return response()->json(['success' => false, 'message' => 'Mật khẩu hiện tại không đúng!']);
        }

        // Cập nhật mật khẩu mới
        DB::table('users')->where('user_id', $user_id)->update(['user_password' => md5($request->new_password)]);

        return response()->json(['success' => true, 'message' => 'Cập nhật mật khẩu thành công!']);
    }

    // public function userDetailPage()
    // {
    //     return view('admin.user.view-user');
    // }
    // public function userUpdatePage()
    // {
    //     return view('admin.user.update-user');
    // }

    // // public function save_user(Request $request)
    // // {    }
    // public function edit_user($product_id)
    // {
    //     $get_product = DB::table('users')->join('categories', 'categories.category_id','=','products.category_id')->where('product_id', $product_id)->get();
    //     $manager_product = view('admin.product.update-product')->with('get_product', $get_product);
    //     return view(view: 'admin.layout.admin-layout')->with('admin.product.update-product', @$manager_product);

    // }

    // public function update_product(Request $request, $product_id)
    // {

    //     $data = array();
    //     $data['product_name'] = $request->product_name;
    //     $data['product_sort_desc'] = $request->product_sort_desc;
    //     $data['product_long_desc'] = $request->product_long_desc;
    //     $data['product_quantity'] = $request->product_quantity;
    //     $data['product_target'] = $request->product_target;
    //     $data['product_price'] = $request->product_price;
    //     $data['category_id'] = $request->product_cate;
    //     $data['product_fact'] = $request->product_fact;
    //     $get_image = $request->file('product_image');
    //     if($get_image){
    //         $new_image =$get_image->getClientOriginalName();
    //         $get_image->move('public/backend/products-images',$new_image);
    //         $data['product_image'] = $new_image;
    //         DB::table('users')->where('product_id', $product_id)->update($data);
    //         Session::put('message', 'Cập nhật sản phẩm thành công.');
    //         return Redirect::to('admin/product');
    //     }else{

    //         DB::table('users')->where('product_id', $product_id)->update($data);
    //         Session::put('message', 'Cập nhật sản phẩm thành công.');
    //         return Redirect::to('admin/product');
    //     }

    // }
    // public function view_product($product_id)
    // {
    //     $view_product = DB::table('users')->where('product_id', $product_id)->get();
    //     $manager_product = view('admin.product.view-product')->with('view_product', $view_product);
    //     return view(view: 'admin.layout.admin-layout')->with('admin.product.view-product', @$manager_product);
    // }
    // public function delete_product($product_id)
    // {
    //     DB::table('users')->where('product_id', $product_id)->delete();
    //     Session::put('message', 'Xóa sản phẩm thành công');
    //     return Redirect::to('admin/product');
    // }
}
