<?php

namespace App\Http\Controllers\API;

use App\Http\Components\SmsSender;
use App\Http\Controllers\Controller;
use App\InstallApp;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function send(Request $request)
    {
        $app_id = $request->input('app_id');
        $message = $request->input('message');
        $addresses = $request->input('addresses');
        
        // Optional: Can provide a custom url if it's different from standard sms api
        $url = $request->input('url', 'https://api.applink.com.bd/otp/request'); 

        if (!$app_id || !$message || !$addresses) {
            return response()->json([
                'statusCode' => 'E1312',
                'statusDetail' => 'Request Invalid. Missing required parameters (app_id, message, addresses).'
            ], 400);
        }

        // Fetch app credentials from the database
        $app_info = InstallApp::where("app_id", $app_id)->first();
        if (!$app_info) {
            return response()->json([
                'statusCode' => 'E1312',
                'statusDetail' => 'App ID not found in the system. Please install the app first.'
            ], 404);
        }

        $password = $app_info->password;

        $sms_ob = new SmsSender($url, $app_id, $password);
        
        // Ensure addresses is an array if passed as string (e.g. single number)
        if (is_string($addresses)) {
            $addresses = [$addresses];
        }

        $response = $sms_ob->sms($message, $addresses);
        
        return response()->json([
            'success' => true,
            'response' => json_decode($response) ?? $response
        ]);
    }
}

