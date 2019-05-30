<?php

namespace SellyHandler;

class Webhook
{

    private $validated;

    public function __construct($post, $secret)
    {
        if ($this->validate($post, $secret, $this->header())) {
            $this->validated = true;
        }else{
            $this->validated = false;
        }


    }

    private function header()
    {
        return $_SERVER['HTTP-X-Selly-Signature'];
    }

    private function validate($post, $secret, $header)
    {
        $signature = hash_hmac('sha512', json_encode($post), $secret);
            if (hash_equals($signature, $header)) {
                return true;
            }
        return false;
    }

    public function validated(){
        return $this->validated;
    }


}
