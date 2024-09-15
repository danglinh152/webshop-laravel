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
        return view('admin.product.add-product');
    }
}
