<?php

namespace SellyHandler;

use Selly\Payments;

/**
 * Class Payment
 */
class Payment
{

    /**
     * @var
     * Where the customer returns to when paid via PayPal.
     */
    private $return_url;
    /**
     * @var
     * Where the webhook notifications get sent to
     */
    private $webhook_url;
    /**
     * @var
     * The customer's email
     */
    private $email;
    /**
     * @var
     * Amount in USD
     */
    private $amount;
    /**
     * @var
     * Gateway used
     */
    private $gateway;
    /**
     * @var bool
     * Whitelabel true or false
     */
    private $whitelabel;

    /**
     * Payment constructor.
     * @param Invoice $invoice
     * @param $return_url
     * @param $webhook_url
     * Get the invoice instance and define the return url and webhook url
     */
    public function __construct(Invoice $invoice, $return_url, $webhook_url)
    {
        $this->return_url = $return_url;
        $this->webhook_url = $webhook_url;
        $this->email = $invoice->email;
        $this->amount = $invoice->amount;
        $this->gateway = $invoice->gateway;
        $this->whitelabel = $invoice->whitelabel;

    }

    /**
     * @return mixed
     * Make the request to selly to get the payment object
     * Returns the selly payment object
     */
    public function pay(){
        $client = new Payments();
        $payment = $client->create([
            'title' => 'API PAYMENT',
            'gateway' => $this->gateway,
            'email' => $this->email,
            'value'=> $this->amount,
            'currency' => 'USD',
            'return_url' => $this->return_url,
            'webhook_url' => $this->webhook_url,
            'white_label' => $this->whitelabel
        ]);
        return $payment;
    }

}