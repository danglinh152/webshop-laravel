<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    public function productDetailPage($product_id)
    {
        $get_product = DB::table('product')->where('product_id', $product_id)->get();
        return view('client.product.detail')->with('get_product', $get_product);
    }

    public function getHomePage()
    {
        $all_product = DB::table('product')->orderby('product_id', 'desc')->get();
        $manager_product = view('client.homepage.home')->with('all_product', $all_product);
        return view(view: 'client.layout.homepage-layout')->with('client.homepage.home', @$manager_product);
    }
    public function productShowPage()
    {
        $all_product = DB::table('product')->orderBy('product_id', 'desc')->get();
        return view('client.product.show')->with('all_product', $all_product);
    }
}
