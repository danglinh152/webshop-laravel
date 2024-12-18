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
        // Validate incoming request
        $request->validate([
            'review_content' => 'required|string|max:255', // Added max length validation
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $product_id = Session::get('product_id');
        $user_id = Session::get('user_id');

        // Check if the user_id and product_id are available
        if (!$user_id || !$product_id) {
            return response()->json(['success' => false, 'message' => 'User or product not found.'], 400);
        }

        // Prepare the data for insertion
        $data = [
            'user_id' => $user_id,
            'product_id' => $product_id,
            'comment' => $request->review_content,
            'rating' => $request->rating,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Insert the review into the database
        DB::table('review')->insert($data);

        // Prepare the response data
        $response = [
            'success' => true,
            'user_id' => $user_id,
            'comment' => $request->review_content,
            'rating' => $request->rating,
            'updated_at' => now()->format('Y-m-d H:i:s'), // Format the date as needed
        ];

        return response()->json($response);
    }



    public function view_review($product_id)
    {
        $all_review = DB::table('review')
        ->join('users', 'users.user_id', '=', 'review.user_id')
        ->where('review.product_id', $product_id)
        ->select(
            'review.review_id',
            'review.rating',
            'review.comment',
            'review.updated_at',
            'users.user_id',
            'users.user_first_name',
            'users.user_last_name',
            'users.user_image'
        )
        ->get();
        return $all_review;
    }
}
