<?php

namespace Tests;

use PayuTools\Client;
use PayuTools\Merchant;
use PayuTools\Request\Token\CancelRequest;

class CancelTokenTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Client */
    protected $client;

    protected function setUp()
    {
        $merchant = new Merchant('OPU_TEST', 'SECRET_KEY');
        $this->client = new Client($merchant);
    }

    public function testCancel()
    {
        $cancelRequest = new CancelRequest('5213b33bad3c07e87e8f032c94452bdc', 'Token cancelled');
        $response = $this->client->send($cancelRequest);
        $this->assertEquals($response->getStatus(), 'fail');
        $this->assertNotNull($response->getError());
    }
}
