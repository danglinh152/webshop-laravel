<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function showProductPage()
    {
        $all_product = DB::table('product')->orderby('product_id', 'desc')->get();
        $manager_product = view('admin.product.show-product')->with('all_product', $all_product);
        return view(view: 'admin.layout.admin-layout')->with('admin.product.show-product', @$manager_product);
    }
    public function addProductPage()
    {
        return view('admin.product.add-product');
    }
    public function productDetailPage()
    {
        return view('admin.product.view-product');
    }
    public function productUpdatePage()
    {
        return view('admin.product.update-product');
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_short_desc'] = $request->product_short_desc;
        $data['product_long_desc'] = $request->product_long_desc;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_target'] = $request->product_target;
        $data['product_price'] = $request->product_price;
        if ($request->product_cate === 'laptop') {
            $data['category_id'] = 2;
        } else if ($request->product_cate === 'phone') {
            $data['category_id'] = 3;
        } else {
            $data['category_id'] = 1;
        }
        $data['product_fact'] = $request->product_fact;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/backend/products-images', $new_image);
            $data['product_image'] = ($new_image);
            DB::table('product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công.');
            return Redirect::to('admin/product');
        } else {
            $data['product_image'] = '';
            DB::table('product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công.');
            return Redirect::to('admin/product');
        }
    }
    public function edit_product($product_id)
    {
        $get_product = DB::table('product')->join('category', 'category.category_id', '=', 'product.category_id')->where('product_id', $product_id)->get();
        $manager_product = view('admin.product.update-product')->with('get_product', $get_product);
        return view(view: 'admin.layout.admin-layout')->with('admin.product.update-product', @$manager_product);
    }

    public function update_product(Request $request, $product_id)
    {

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_short_desc'] = $request->product_short_desc;
        $data['product_long_desc'] = $request->product_long_desc;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_target'] = $request->product_target;
        $data['product_price'] = $request->product_price;
        if ($request->product_cate === 'laptop') {
            $data['category_id'] = 2;
        } else if ($request->product_cate === 'phone') {
            $data['category_id'] = 3;
        } else {
            $data['category_id'] = 1;
        }
        $data['product_fact'] = $request->product_fact;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $new_image = $get_image->getClientOriginalName();
            $get_image->move('public/backend/products-images', $new_image);
            $data['product_image'] = $new_image;

            $check = DB::table('product')->where('product_id', $product_id)->update($data);
            if (isset($check)) {
                Session::put('message', 'Cập nhật sản phẩm thành công.');
            } else Session::put('message', 'Cập nhật sản phẩm thất bại.');
            return Redirect::to('admin/product');
        } else {

            $check = DB::table('product')->where('product_id', $product_id)->update($data);
            if (isset($check)) {
                Session::put('message', 'Cập nhật sản phẩm thành công.');
            } else Session::put('message', 'Cập nhật sản phẩm thất bại.');
            return Redirect::to('admin/product');
        }
    }
    public function view_product($product_id)
    {
        $view_product = DB::table('product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.product.view-product')->with('view_product', $view_product);
        return view(view: 'admin.layout.admin-layout')->with('admin.product.view-product', @$manager_product);
    }
    public function delete_product($product_id)
    {
        DB::table('product')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công');
        return Redirect::to('admin/product');
    }
    public function active_product($product_id)
    {
        DB::table('product')->where('product_id', operator: $product_id)->update(['status' => 'show']);
        Session::put('message', 'Đã hiển thị sản phẩm');
        return Redirect::to('admin/product');
    }
    public function unactive_product($product_id)
    {
        DB::table('product')->where('product_id', $product_id)->update(['status' => 'hide']);
        Session::put('message', 'Đã ẩn sản phẩm');
        return Redirect::to('admin/product');
    }
    
}
