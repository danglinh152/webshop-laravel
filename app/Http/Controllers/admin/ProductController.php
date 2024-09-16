<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{
    public function showProductPage()
    {
        return view('admin.product.show-product');
    }
    public function addProductPage()
    {
        // $cate_product = DB::table('categories')->orderBy('category_name', 'asc')->get();
        // $fact_product = DB::table('factories')->orderby('factory_name','asc')->get();

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
        $data['product_desc'] = $request->product_desc;
        $data['product_status'] = $request->product_status;
        $data['product_content'] = $request->product_content;
        $data['product_price'] = $request->product_price;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $get_image = $request->file('product_image');   
        if($get_image){
            $new_image =$get_image->getClientOriginalName();
            $get_image->move('public/img_upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công.');
            return Redirect::to('add-product');
        }else{
            $data['product_image'] = '';
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công.');
            return Redirect::to('all-product');
        }
        
    }
    
}
