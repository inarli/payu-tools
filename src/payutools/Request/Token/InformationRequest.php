<?php
/**
 * PayU Information Request Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */

namespace PayuTools\Request\Token;

use GuzzleHttp\Psr7\Response;
use PayuTools\Response\Token\InformationResponse;

class InformationRequest extends AbstractTokenRequest
{
    static $HTTP_REQUEST_METHOD = 'GET';

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function buildResponse(Response $response)
    {
        $this->response = new InformationResponse($response);
    }

    public function buildEndpoint()
    {
        $this->endpoint = sprintf('%s/%s', $this->endpoint, $this->token);
    }
}
