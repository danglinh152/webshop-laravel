<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class FacebookAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callbackFacebook()
    {
        try {
            $facebook_user = Socialite::driver('facebook')->user();

            // Tìm người dùng trong bảng tbl_user
            $user = User::where('facebook_id', $facebook_user->getId())->first();

            if (!$user) {
                // Tạo người dùng mới nếu không tìm thấy
                $data = [
                    'user_first_name' => $facebook_user->getName(),
                    'user_email' => $facebook_user->getEmail(),
                    'facebook_id' => $facebook_user->getId(),
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

            session(['user_name' => $facebook_user->getName()]);
            session(['user_id' => $facebook_user->getId()]);
            session(['image' => $facebook_user->getAvatar()]);
            return redirect()->to('/'); // Redirect to the home page
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('facebook OAuth callback error: ' . $e->getMessage());
            return redirect()->to('/login')->with('error', 'An error occurred while logging in with facebook.'); // Error message
        }
    }
}
