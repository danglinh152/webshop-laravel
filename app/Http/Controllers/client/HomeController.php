<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.homepage.home');
    }

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
}
