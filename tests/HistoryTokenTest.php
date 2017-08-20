<?php
/**
 * PayU Token History Request Test
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */

namespace Tests;

use PayuTools\Client;
use PayuTools\Merchant;
use PayuTools\Request\Token\HistoryRequest;

class HistoryTokenTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Client */
    protected $client;

    protected function setUp()
    {
        $merchant = new Merchant('OPU_TEST', 'SECRET_KEY');
        $this->client = new Client($merchant);
    }

    public function testHistory()
    {
        $cancelRequest = new HistoryRequest('5213b33bad3c07e87e8f032c94452bdc');
        $response = $this->client->send($cancelRequest);
        $this->assertEquals($response->getStatus(), 'success');
        $this->assertNull($response->getError());
        $this->assertArrayHasKey('history', $response->getData());
        $this->assertArrayHasKey('originalSale', $response->getData());
    }
}
