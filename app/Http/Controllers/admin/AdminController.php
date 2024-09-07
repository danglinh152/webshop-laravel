<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin-login');
    }

    public function showDashboard()
    {
        return view('admin.dashboard');
    }
}
