<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('client.homepage.information');
    }
    public function getOrderHistoryPage()
    {
        return view('client.homepage.order-history');
    }
}
