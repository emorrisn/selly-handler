<?php
namespace SellyHandler;

use Selly;

/**
 * Class Authorisation
 * @package SellyHandler
 */
class Authorisation
{
    /**
     * Authorisation constructor.
     * @param $email
     * @param $token
     * Authorize on Selly.gg
     */
    public function __construct($email, $token)
    {
        if (!empty( $email && $token)){
            Selly\Client::authenticate($email, $token);
        }
        return false;
    }
}