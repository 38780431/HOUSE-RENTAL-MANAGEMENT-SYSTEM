<?php
// stkpush.php

date_default_timezone_set('Africa/Nairobi');

// Your sandbox app credentials
$consumerKey = "fCwqL1EdgWVsq3kXpVJFZo5MFv5JiiwzNwGHqqSBRS8vrUQH";
$consumerSecret = "jagf7yfcSYVFe1eGwzV93qKGviJxA19fa2NyAJ7sA0PSuF7lXQ4ZIPo2bJcoLljZ";

// Sandbox Shortcode & Passkey
$BusinessShortCode = '174379';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

// Get phone and amount from frontend form
$phone = $_POST['phone'];
$Amount = $_POST['amount'];  

// ✅ Format phone number
$phone = preg_replace('/\s+/', '', $phone); // remove spaces
$phone = ltrim($phone, '+'); // remove leading +

if (substr($phone, 0, 1) === '0') {
    // Convert 07XXXXXXXX → 2547XXXXXXXX
    $phone = '254' . substr($phone, 1);
}

// ✅ Validate phone number
if (!preg_match('/^2547\d{8}$/', $phone)) {
    die(json_encode([
        "errorCode" => "400.002.02",
        "errorMessage" => "Invalid PhoneNumber format. Use 2547XXXXXXXX"
    ]));
}

$PartyA = $phone; 
$AccountReference = "NyumbaniHomes";
$TransactionDesc = "House Rent Payment";

// Callback URL (must be accessible by Safaricom — use Ngrok if local)
$CallBackURL = "https://yourdomain.com/callback.php";

// Generate timestamp
$Timestamp = date('YmdHis');

// Password
$Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);

// 1. Generate Access Token
$credentials = base64_encode($consumerKey.":".$consumerSecret);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

$token = json_decode($response)->access_token;

// 2. Initiate STK Push
$stkheader = ['Content-Type:application/json','Authorization:Bearer '.$token];

$curl_post_data = [
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $Password,
  'Timestamp' => $Timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $Amount,
  'PartyA' => $PartyA,
  'PartyB' => $BusinessShortCode,
  'PhoneNumber' => $PartyA,
  'CallBackURL' => $CallBackURL,
  'AccountReference' => $AccountReference,
  'TransactionDesc' => $TransactionDesc
];

$ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
curl_setopt($ch, CURLOPT_HTTPHEADER, $stkheader);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curl_post_data));
$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
