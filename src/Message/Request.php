<?php

namespace Omnipay\Zero\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;

/**
 * Zero Request
 *
 * @method Response send()
 */
class Request extends AbstractRequest
{
    /**
     * @return array
     *
     * @throws InvalidRequestException
     */
    public function getData()
    {
        $this->validate('amount');

        return $this->getParameters();
    }

    /**
     * Validate the request.
     *
     * @param string ... a variable length list of required parameters
     * @throws InvalidRequestException
     */
    public function validate()
    {
        foreach (func_get_args() as $key) {
            $value = $this->parameters->get($key);
            if ($key === 'amount') {
                if ($value != 0) {
                    throw new InvalidRequestException("The $key parameter must be 0");
                }
            } elseif (empty($value)) {
                throw new InvalidRequestException("The $key parameter is required");
            }
        }
    }

    /**
     * @param mixed $data
     *
     * @return Response
     */
    public function sendData($data)
    {
        return $this->response = new Response($this, $data);
    }
}
