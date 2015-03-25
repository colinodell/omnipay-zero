<?php

namespace Omnipay\Zero;

use Omnipay\Common\AbstractGateway;

/**
 * Zero-Amount Gateway
 *
 * This gateway is useful for processing zero amount (free) orders. It will only authorize payment amounts of 0.
 */
class Gateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Zero';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return array();
    }

    /**
     * @param array $parameters
     *
     * @return Request
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Zero\Message\Request', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Request
     */
    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Zero\Message\Request', $parameters);
    }

    /**
     * @param array $parameters
     *
     * @return Request
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Zero\Message\Request', $parameters);
    }
}
