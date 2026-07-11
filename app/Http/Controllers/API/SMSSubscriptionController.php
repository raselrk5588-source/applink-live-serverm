<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SMSSubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $payload = $request->all();
        Log::info('Applink SMS Webhook Received', ['payload' => $payload]);

        // You can add logic here to parse the SMS, check if it's a subscription request, etc.
        // For Applink, we generally must return S1000 for success.
        
        return response()->json([
            'statusCode' => 'S1000',
            'statusDetail' => 'Success',
        ]);
    }
}
