# selly-handler

This class is for generating Selly **payments** using their API and to help you handle **webhooks**.


# Features

* Easy to use and install
* Create **payments** easily
* Handle **webhooks** easily
* Support for **Bitcoin** and **PayPal**

## Examples
* Generate payment
```php
use SellyHandler\Invoice;  
use SellyHandler\Authorisation;  
use SellyHandler\Payment;  
  
  
// Authenticate  
new Authorisation('EMAIL','TOKEN');  
  
// Create a new invoice
// Customer email, amount in dollars, white label true or false
$invoice = new Invoice('CUSTOMER EMAIL',10, true);  
  
// Choose gateway for the invoice  
$invoice->Gateway()->Bitcoin();  
// Or
$invoice->Gateway()->PayPal();  
  
// Get the payment object, if you selected white label earlier
// you will get the raw data to display or a PayPal link.
// Non white label payments will just return an URL.
$payment = new Payment($invoice,'RETURN_URL','WEBHOOK_URL');
```
* Webhook
```php
use SellyHandler\Webhook;  
  
// Give the class the POST and the secret  
$webhook = new Webhook($_POST,'SECRET');  
  
// Check if the webhook is validated  
if ($webhook->validated()){  
 // Handle the webhook  
 // Status codes 
 // 0   No payment has been received 
 // 51  PayPal dispute/reversal 
 // 52  Order blocked due to risk level exceeding the maximum for the product 
 // 53  Partial payment. When crypto currency orders do not receive the full amount required due to fees, etc. 
 // 54  Crypto currency transaction confirming 
 // 55  Payment pending on PayPal. Most commonly due to e-checks. 
 // 56  Refunded // 100 Payment complete
 }
```

## Installation

```
composer require lyutiq/selly-handler
```

Have fun!
