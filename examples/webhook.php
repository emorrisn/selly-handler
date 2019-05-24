<?php
require_once 'vendor/autoload.php';

use SellyHandler\Webhook;

// Give the class the POST and the secret
$webhook = new Webhook($_POST,'SECRET');

// Check if the webhook is validated
if ($webhook->validated()){
    // Handle the webhook
    // Status codes
    // 0	No payment has been received
    // 51	PayPal dispute/reversal
    // 52	Order blocked due to risk level exceeding the maximum for the product
    // 53	Partial payment. When crypto currency orders do not receive the full amount required due to fees, etc.
    // 54	Crypto currency transaction confirming
    // 55	Payment pending on PayPal. Most commonly due to e-checks.
    // 56	Refunded
    // 100	Payment complete
}
