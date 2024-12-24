<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $characters_otp = '0123456789';
        $randomString_otp = '';

        for ($i = 0; $i < 4; $i++) {
            $randomString_otp .= $characters_otp[rand(0, strlen($characters_otp) - 1)];
        }
        $OTP = $randomString_otp;
        $to_name = "10pm Store";
        $to_email = $request->email; //send to this email
        $data = array("name" => "10pm Store", "OTP" => $OTP); //body of mail.blade.php

        Mail::send('admin.mail-service.sendMailOTP', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('10pm Store forget password'); //send this mail with subject
            $message->from($to_email, $to_name); //send from this mail
        });
        Session::put('otp', $OTP);
        Session::put('email', $to_email);
        return Redirect('/verify-otp');
        // return redirect('/verify-otp');
    }
    public function verify(Request $request)
    {
        $otp1 = $request->otp1;
        $otp2 = $request->otp2;
        $otp3 = $request->otp3;
        $otp4 = $request->otp4;

        $otp = $request->otp;


        if ($otp1 . $otp2 . $otp3 . $otp4 == $otp) {
            $characters_passwd = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $randomString_passwd = '';

            for ($i = 0; $i < 10; $i++) {
                $randomString_passwd .= $characters_passwd[rand(0, strlen($characters_passwd) - 1)];
            }
            $new_passwd = $randomString_passwd;
            $to_name = "10pm Store";
            $to_email = $request->email; //send to this email


            $data = array("name" => "10pm Store", "password" => $new_passwd); //body of mail.blade.php

            Mail::send('admin.mail-service.sendMailNewPasswd', $data, function ($message) use ($to_name, $to_email) {
                $message->to($to_email)->subject('Your new password'); //send this mail with subject
                $message->from($to_email, $to_name); //send from this mail
            });

            $user = DB::table('users')->where('user_email', $to_email)->first();

            if ($user) {
                DB::table('users')
                    ->where('user_email', $to_email)
                    ->update(['user_password' => md5($new_passwd)]); // Sử dụng bcrypt để mã hóa mật khẩu
            }

            Session::put('message', "Mật khẩu mới đã được gửi về mail của bạn!");

            return Redirect::to('/');
        } else {
            Session::put('err_msg', "Mật khẩu hoặc tài khoản sai! Vui lòng nhập lại!");
            return Redirect::to('/login');
        }
        // return redirect('/verify-otp');
    }
}
