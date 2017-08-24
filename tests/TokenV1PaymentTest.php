<?php
/**
 * PayU Token v1 Payment Test
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace Tests;

use PayuTools\Client;
use PayuTools\Merchant;
use PayuTools\Request\v1\Token\PaymentRequest;

class TokenV1PaymentTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Client */
    protected $client;

    protected function setUp()
    {
        $merchant = new Merchant('OPU_TEST', 'SECRET_KEY');
        $this->client = new Client($merchant);
    }

    public function testTokenV1Payment()
    {
        $refundRequest = new PaymentRequest(50, 'TRY', '34294641', 'ASD');;
        /** @var \PayuTools\Response\v1\Token\TokenV1PaymentResponse $response */
        $response = $this->client->send($refundRequest);
        $this->assertEquals($response->getStatus(), 'success');
        $this->assertNotNull($response->getTransferRefNo());
        $this->assertNull($response->getError());
        $this->assertNull($response->getErrorCode());
    }
}
