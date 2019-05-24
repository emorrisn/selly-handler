<?php


namespace SellyHandler;


/**
 * Class Gateway
 * @package SellyHandler
 */
class Gateway
{


    /**
     * @var Invoice
     * The invoice instance
     */
    private $instance;


    /**
     * Gateway constructor.
     * @param Invoice $customer
     * Throw in the invoice instance
     */
    public function __construct(Invoice $customer)
    {
        $this->instance = $customer;
    }

    /**
     * Set the gateway to Bitcoin
     */
    public function Bitcoin(){
        $this->instance->setGateway('Bitcoin');
    }

    /**
     * Set the gateway to PayPal
     */
    public function PayPal(){
        $this->instance->setGateway('PayPal');
    }
}