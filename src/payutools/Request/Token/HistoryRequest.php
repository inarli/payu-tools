<?php
/**
 * PayU History Request Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace PayuTools\Request\Token;

use GuzzleHttp\Psr7\Response;
use PayuTools\Response\Token\HistoryResponse;
use PayuTools\Interfaces\RequestInterface;

class HistoryRequest extends AbstractTokenRequest implements RequestInterface
{
    static $HTTP_REQUEST_METHOD = 'GET';

    public function __construct($token)
    {
        $this->setToken($token);
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function buildResponse(Response $response)
    {
        $this->response = new HistoryResponse($response);
    }

    public function buildEndpoint()
    {
        $this->endpoint = sprintf('%s/%s/history', $this->endpoint, $this->token);
    }
}
