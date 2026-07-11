<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class InstructionController extends Controller
{
    private $data;

    public function __construct()
    {

        $this->middleware(function ($request, $next) {
            Session::put('top_menu',"instruction");
            Session::put('sub_menu',"instruction");
            return $next($request);
        });
    }
   public function index()
    {
        $ip = gethostbyname($_SERVER['SERVER_NAME']);
        $this->data['host_address']=$ip;
        $this->data['sms_url'] = url('/applink/sms');
        $this->data['ussd_url'] = url('/applink/ussd');
        $this->data['notification_url'] = url('/applink/notify');
        return view("user.instruction.instruction",$this->data);
    }
}
