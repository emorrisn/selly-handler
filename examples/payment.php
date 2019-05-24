<?php
require_once 'vendor/autoload.php';

use SellyHandler\Invoice;
use SellyHandler\Authorisation;
use SellyHandler\Payment;


// Authenticate
new Authorisation('EMAIL','TOKEN');

// Create a new invoice
$invoice = new Invoice('CUSTOMER EMAIL',10,true);

// Choose gateway for the invoice
// Only supports Bitcoin and PayPal as of now
$invoice->Gateway()->Bitcoin();

// Get the payment object, use this data to redirect the customer if
// the gateway is PayPal, or show the data if its Bitcoin
$payment = new Payment($invoice,'RETURN_URL','WEBHOOK_URL');



