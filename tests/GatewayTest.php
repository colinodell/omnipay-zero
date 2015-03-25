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

    public function testSupportsAuthorize()
    {
        $this->assertTrue($this->gateway->supportsAuthorize());
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

    public function testSupportsCapture()
    {
        $this->assertTrue($this->gateway->supportsCapture());
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

    public function testSupportsPurchase()
    {
        $this->assertTrue($this->gateway->supportsPurchase());
    }

    public function testPurchaseZeroAmount()
    {
        $options = array('amount' => 0);
        $response = $this->gateway->purchase($options)->send();

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

    /**
     * @expectedException \Omnipay\Common\Exception\InvalidRequestException
     */
    public function testPurchaseNonZeroAmount()
    {
        $options = array('amount' => 100);
        $response = $this->gateway->purchase($options)->send();
    }
}
