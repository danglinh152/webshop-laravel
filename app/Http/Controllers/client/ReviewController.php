<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class ReviewController extends Controller
{

    public function post_review(Request $request)
    {
        $product_id = Session::get('product_id');
        $user_id = Session::get('user_id');
        $data = array();
        $data['user_id'] = $user_id;
        $data['product_id'] = $product_id;
        $data['comment'] = $request->review_content;
        $data['rating'] = $request->rating;
        DB::table('review')->insert($data);
        Session::put('message_review', 'Thêm review thành công.');
        return Redirect::to("/product/{$product_id}");
    }

    public function view_review($product_id)
    {
        $all_review = DB::table(table: 'review')->join('users', 'users.user_id', '=', 'review.user_id')->where('product_id', $product_id)->get();
        return view('client.product.detail')->with('all_review', $all_review);
    }
}
