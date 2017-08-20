<?php
/**
 * PayU Refund Test
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace Tests;

use PayuTools\Client;
use PayuTools\Merchant;
use PayuTools\Request\Refund\RefundRequest;

class RefundTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Client */
    protected $client;

    protected function setUp()
    {
        $merchant = new Merchant('OPU_TEST', 'SECRET_KEY');
        $this->client = new Client($merchant);
    }

    public function testRefund()
    {
        $cancelRequest = new RefundRequest(38821779, '241.94', 'TRY', '100');
        $response = $this->client->send($cancelRequest);
        $this->assertEquals($response->getStatus(), 'fail');
        $this->assertNotEquals($response->getData()['response_msg'], 'OK');
        $this->assertNotNull($response->getError());
    }
}
