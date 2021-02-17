<?php

use AfricasTalking\SDK\AfricasTalking;


function api_response($success, $errors, $status_message, $message, $data)
{
    $response = array();
    $response['success'] = $success;
    $response['errors'] = $errors;
    $response['status_message'] = $status_message;
    $response['message'] = $message;
    $response['data'] = $data;

    return $response;
}

function sendSMS($phoneNumber, $text){
    $username = 'felixivance'; // use 'sandbox' for development in the test environment
    $apiKey   = '42eb57d1d7700193c7fb147385d4778f1f43f01dcf9da3045fa8c716dd1b5d40'; // use your sandbox app API key for development in the test environment
    $AT       = new AfricasTalking($username, $apiKey);

// Get one of the services
    $sms      = $AT->sms();

// Use the service
    $result   = $sms->send([
        'to'      => $phoneNumber,
        'message' => $text
    ]);

    return $result;
}
function convert_phone_to_kenyan_format($phone_no){

    $phone = "";
    //format phone
    if (substr($phone_no, 0, 2) === "07")//if phone starts with 07
    {
        $phone = "+" . substr_replace($phone_no, "254", 0, 1);
    } elseif (substr($phone_no, 0, 1) === "7")//if starts with 7
    {
        $phone = "+" . substr_replace($phone_no, "254", 0, 0);
    } elseif (substr($phone_no, 0, 4) === "+254") {
        $phone = "+" . substr_replace($phone_no, "", 0, 1);
    } elseif (substr($phone_no, 0, 3) === "254") {
        $phone = "+" . $phone_no;
    } else {
        return $phone_no;
    }
    return $phone;

}
