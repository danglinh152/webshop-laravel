<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class OnlineCheckoutController extends Controller
{
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Increase timeout to 30 seconds
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); // Increase connection timeout to 30 seconds
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }


    public function online_checkout(Request $request)
    {
        $paymentMethod = $request->input('payment');
        $total = $request->input('total');
        $cart = session('cart');
        $orderinfo = "";
        foreach ($cart as $key => $cart_value) {
            $orderinfo .= $cart_value->product_name . " x " . $cart_value->quantity . ", ";
        }


        if ($paymentMethod == 'cod') {
            $orderController = new OrderController();
            $orderRequest = new Request([
            'total' => $request->input('total'),
            'receiverPhone' => $request->input('receiverPhone'),
            'receiverAddress' => $request->input('receiverAddress'),
            'receiverNote' => $request->input('receiverNote'),
            ]);
            $orderController->save_order($orderRequest);
            return view('client.cart.success');
        } elseif ($paymentMethod == "payUrl") {
            // MoMo Payment Information
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

            // MoMo API credentials
            $partnerCode = 'MOMOBKUN20180529';  // Replace with your Partner Code
            $accessKey = 'klm05TvNBzhg7h7j';  // Replace with your Access Key
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';  // Replace with your Secret Key

            // Order information
            $orderInfo = $orderinfo;  // Replace with actual order information
            $amount = $total;  // Replace with actual amount
            $orderId = time() . "";  // Order ID based on current time
            $redirectUrl = "http://localhost:8888/webshop-laravel/success";  // Replace with your actual redirect URL
            $ipnUrl = "http://localhost:8888/webshop-laravel/success";  // IPN URL (Payment Notification URL)
            $extraData = "";  // Extra data (optional)

            // Create request ID for MoMo payment
            $requestId = time() . "";
            $requestType = "payWithATM";  // Payment type (can be ATM, credit card, etc.)
            // $requestType = "captureWallet";  // Payment type (can be ATM, credit card, etc.)

            // Create raw data for HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);  // Generate signature

            // Data array to send to MoMo API
            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',  // Vietnamese language
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            // Send POST request to MoMo API
            $result = $this->execPostRequest($endpoint, json_encode($data));

            // Decode the JSON response from MoMo
            $jsonResult = json_decode($result, true);

            // If the request is successful, MoMo will return a payUrl for redirection
            if ($jsonResult['resultCode'] == '0') {
                // Redirect to MoMo's payment page
                header('Location: ' . $jsonResult['payUrl']);
                exit();  // Make sure to stop further execution after the redirect
            } else {
                // Handle error if resultCode is not 0
                echo "Error: " . $jsonResult['message'];
            }
        }
    }

    // public function handleIpn(Request $request)
    // {
    //     $status = $request->input('status');

    //     if ($status == 'success') {
    //         return redirect('/success');
    //     } else {
    //         return redirect('/error');
    //     }
    // }

    public function getSuccessPage(Request $request)
    {
        $message = $request->query('message');

        if (strpos($message, 'rejected') !== false) {
            return view('client.cart.error');
        } else {
            $orderController = new OrderController();
            $orderRequest = new Request([
            'total' => $request->input('total'),
            'receiverPhone' => $request->input('receiverPhone'),
            'receiverAddress' => $request->input('receiverAddress'),
            'receiverNote' => $request->input('receiverNote'),
            ]);
            $orderController->save_order($orderRequest);
            return view('client.cart.success');
            return view('client.cart.success');
        }
    }
}
