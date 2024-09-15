<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function productDetailPage()
    {
        return view('client.product.detail');
    }

    public function productShowPage()
    {
        return view('client.product.show');
    }
}
