<?php


namespace SellyHandler;


/**
 * Class Invoice
 * @package SellyHandler
 */
class Invoice
{

    /**
     * @var
     * Gateway used for payment
     */
    public $gateway;

    /**
     * @var
     * Customer's email
     */
    public $email;

    /**
     * @var
     * Amount in USD
     */
    public $amount;

    /**
     * @var bool
     * White label, so, selly branding or not
     */
    public $whitelabel;


    /**
     * Invoice constructor.
     * @param $email
     * @param $amount
     * @param bool $whitelabel
     * Throw in the invoice details
     */
    public function __construct($email, $amount, $whitelabel = true)
    {
        $this->email = $email;
        $this->amount = $amount;
        $this->whitelabel = $whitelabel;
    }

    /**
     * @param $gateway
     * Set the gateway
     */
    public function setGateway($gateway){
        $this->gateway = $gateway;
    }

    /**
     * @return Gateway
     * Get the gateway instance
     */
    public function Gateway(){
        return new Gateway($this);
    }


}