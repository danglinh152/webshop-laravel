<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function register()
    {
        return view('client.auth.register');
    }
    public function forgotPassword()
    {
        return view('client.auth.forgotpw');
    }
    public function otp()
    {
        return view('client.auth.otp');
    }

    public function getContactPage(){
        return view('client.homepage.contact');
    }
    public function getInforPage()
    {
        $user_id = Session::get('user_id');
        $user = DB::table('users')->where('user_id', $user_id)->first();
        return view('client.homepage.information')->with('user', $user);
    }
    public function getOrderHistoryPage()
    {
        return view('client.homepage.order-history');
    }
}
