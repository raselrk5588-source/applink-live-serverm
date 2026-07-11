<?php

namespace App\Http\Components;

class ApplinkApi {
    private $url;
    public $app_id = "";
    public $password = "";
    public $subscriberId = "";
    public $ussdresposemessage = "";
    private $status = false;
    private $message = "Invalid Request";
    private $statusCode = "E1312"; // APPLINK ERROR CODE // FOR SUCCESS CODE: "S1000"
    private $statusDetail = "Request Invalid.";
    public $destinationAddress='';
    public $sessionId;
    public $ussdOperation;
    public $version;

    public function isInvalid() {
        $invalid = false;
        $message = "";
        if(!isset($this->app_id)) {
            $message .= " AppId not found!";
            $invalid = true;
        }
        if(!isset($this->password)) {
            $message .= " Password not found!";
            $invalid = true;
        }
//        if(!isset($this->subscriberId)) {
//            $message .= " SubscriberId not found!";
//            $invalid = true;
//        }
        $this->message = $message;
        return $invalid;
    }

    public function errorOutput() {
        return json_encode([
            'statusCode' => $this->statusCode,
            'statusDetail' => $this->statusDetail,
        ]);
    }
    public function ussdSend() {
        if($this->isInvalid()) {
            return $this->errorOutput();
        }
         $arrayField = array(
             "applicationId" => $this->app_id,
            "password" => $this->password,
            "message" => $this->ussdresposemessage,
            "sessionId" => $this->sessionId,
            "ussdOperation" => $this->ussdOperation,
            "destinationAddress" => $this->destinationAddress,
            );
        $json = json_encode($arrayField);
        $this->url = 'https://api.applink.com.bd/ussd/send';
        return $this->sendRequest($json);
    }

    public function subscribe() {
        if($this->isInvalid()) {
            return $this->errorOutput();
        }
         $arrayField = array(
             "applicationId" => $this->app_id,
            "password" => $this->password,
            "version" => $this->version,
            "action" => "1",
            "subscriberId" => $this->subscriberId
            );
        $json=json_encode($arrayField);

        $this->url = 'https://api.applink.com.bd/subscription/send';
        return $this->sendRequest($json);
    }

    public function unSubscribe(){
        if($this->isInvalid()) {
            return $this->errorOutput();
        }
       $arrayField = array(
             "applicationId" => $this->app_id,
            "password" => $this->password,
            "version" => $this->version,
            "action" => "0",
            "subscriberId" => $this->subscriberId
            );
        $json=json_encode($arrayField);

        $this->url = 'https://api.applink.com.bd/subscription/send';
        return $this->sendRequest($json);
    }

    public function getstatus(){
        if($this->isInvalid()) {
            return $this->errorOutput();
        }
       $arrayField = array(
         "applicationId" => $this->app_id,
        "password" => $this->password,
        "subscriberId" => $this->subscriberId
        );


        $json = json_encode($arrayField);
        $this->url = 'https://api.applink.com.bd/subscription/getstatus';
        return $this->sendRequest($json);
    }

    public function sendRequest($jsonStream){

         $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStream);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch); //Send request and get response
        curl_close($ch);
        return $res;

    }

}
