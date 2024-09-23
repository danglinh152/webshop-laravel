<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class UserController extends Controller
{
    public function getUserPage()
    {
        return view('admin.user.show-user');
    }
    public function addUserPage()
    {
        return view('admin.user.add-user');
    }
    public function updateUserPage()
    {
        return view('admin.user.update-user');
    }
}   
