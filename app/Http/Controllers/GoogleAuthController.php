<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            // Tìm người dùng trong bảng tbl_user
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                // Tạo người dùng mới nếu không tìm thấy
                $data = [
                    'user_first_name' => $google_user->getName(),
                    'user_email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'role' => 'customer'
                ];

                // Lưu người dùng mới vào database
                $new_user = User::create($data); // Sử dụng create để tạo người dùng mới

                // Đăng nhập người dùng mới
                Auth::login($new_user);
            } else {
                // Đăng nhập người dùng đã tồn tại
                Auth::login($user);
            }

            session(['user_name' => $google_user->getName()]);
            session(['user_id' => $google_user->getId()]);
            return redirect()->to('/'); // Redirect to the home page
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Google OAuth callback error: ' . $e->getMessage());
            return redirect()->to('/login')->with('error', 'An error occurred while logging in with Google.'); // Error message
        }
    }
}
