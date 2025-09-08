<?php
// callback.php

// Database connection
$host     = "localhost";
$user     = "root";
$password = ""; // change if you have set a password
$dbname   = "rentals_db"; // your database

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Read incoming JSON
$callbackJSON = file_get_contents('php://input');
$callbackData = json_decode($callbackJSON, true);

// Log raw callback (optional, for debugging)
file_put_contents("mpesa_callback_log.txt", $callbackJSON . PHP_EOL, FILE_APPEND);

if (isset($callbackData['Body']['stkCallback'])) {
    $stkCallback = $callbackData['Body']['stkCallback'];

    $MerchantRequestID = $stkCallback['MerchantRequestID'];
    $CheckoutRequestID = $stkCallback['CheckoutRequestID'];
    $ResultCode        = $stkCallback['ResultCode'];
    $ResultDesc        = $stkCallback['ResultDesc'];

    // Default values in case payment failed
    $Amount            = 0;
    $MpesaReceiptNumber= "";
    $TransactionDate   = "";
    $PhoneNumber       = "";

    // Only if ResultCode == 0 (success), extract payment details
    if ($ResultCode == 0) {
        $CallbackMetadata = $stkCallback['CallbackMetadata']['Item'];
        foreach ($CallbackMetadata as $item) {
            if ($item['Name'] == 'Amount') {
                $Amount = $item['Value'];
            }
            if ($item['Name'] == 'MpesaReceiptNumber') {
                $MpesaReceiptNumber = $item['Value'];
            }
            if ($item['Name'] == 'TransactionDate') {
                $TransactionDate = $item['Value'];
            }
            if ($item['Name'] == 'PhoneNumber') {
                $PhoneNumber = $item['Value'];
            }
        }
    }

    // Save into DB
    $stmt = $conn->prepare("INSERT INTO mpesa_payments 
        (MerchantRequestID, CheckoutRequestID, ResultCode, ResultDesc, Amount, MpesaReceiptNumber, TransactionDate, PhoneNumber) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisssss", 
        $MerchantRequestID, 
        $CheckoutRequestID, 
        $ResultCode, 
        $ResultDesc, 
        $Amount, 
        $MpesaReceiptNumber, 
        $TransactionDate, 
        $PhoneNumber
    );
    $stmt->execute();
    $stmt->close();
}

// Safaricom expects a valid response
echo json_encode(["ResultCode" => 0, "ResultDesc" => "Callback received successfully"]);

$conn->close();
?>
