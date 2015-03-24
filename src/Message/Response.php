<?php

namespace Omnipay\Zero\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Zero Response
 */
class Response extends AbstractResponse
{
    public function isSuccessful()
    {
        return true;
    }
}
