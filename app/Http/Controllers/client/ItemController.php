<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    public function productDetailPage()
    {
        return view('client.product.detail');
    }

    public function getHomePage()
    {
        $all_product = DB::table('product')->orderby('product_id', 'desc')->get();
        $manager_product = view('client.homepage.home')->with('all_product', $all_product);
        return view(view: 'client.layout.homepage-layout')->with('client.homepage.home', @$manager_product);
    }
    public function productShowPage()
    {
        return view(view: 'client.product.show');
    }
}
