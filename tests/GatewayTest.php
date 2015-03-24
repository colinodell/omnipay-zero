<?php

namespace Omnipay\Zero;

use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testAuthorizeZeroAmount()
    {
        $options = array('amount' => 0);
        $response = $this->gateway->authorize($options)->send();

        $this->assertInstanceOf('\Omnipay\Zero\Message\Response', $response);
        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getTransactionReference());
        $this->assertNull($response->getMessage());
    }

    public function testCaptureZeroAmount()
    {
        $options = array('amount' => 0);
        $response = $this->gateway->capture($options)->send();

        $this->assertInstanceOf('\Omnipay\Zero\Message\Response', $response);
        $this->assertTrue($response->isSuccessful());
        $this->assertFalse($response->isRedirect());
        $this->assertNull($response->getTransactionReference());
        $this->assertNull($response->getMessage());
    }

    /**
     * @expectedException \Omnipay\Common\Exception\InvalidRequestException
     */
    public function testAuthorizeNonZeroAmount()
    {
        $options = array('amount' => 100);
        $response = $this->gateway->authorize($options)->send();
    }

    /**
     * @expectedException \Omnipay\Common\Exception\InvalidRequestException
     */
    public function testCaptureNonZeroAmount()
    {
        $options = array('amount' => 100);
        $response = $this->gateway->capture($options)->send();
    }
}
