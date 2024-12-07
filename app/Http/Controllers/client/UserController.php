<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $result = DB::table('tbl_user')->where('user_email', $user_email)->where('user_password', $user_password)->first();
        $quantity = DB::table('cart_detail')->join( 'cart', 'cart.cart_id', '=', 'cart_detail.cart_id')->where('user_id', $result->user_id)->count('product_id');

        if ($result) {
            if ($result->role == 'admin') {
                Session::put('admin_name', $result->user_first_name . ' ' . $result->user_last_name);
                Session::put('admin_id', $result->user_id);
                Session::put('image', $result->user_image);
                return Redirect::to('/admin/dashboard');
            } else {
                // client
                Session::put('user_name', $result->user_first_name . ' ' . $result->user_last_name);
                Session::put('user_id', $result->user_id);
                Session::put('image',  $result->user_image);
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
        Session::put('user_name', null);
        return Redirect::to('/login');
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
