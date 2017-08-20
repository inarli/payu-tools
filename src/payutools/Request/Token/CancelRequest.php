<?php
/**
 * PayU Cancel Request Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */

namespace PayuTools\Request\Token;

use GuzzleHttp\Psr7\Response;
use PayuTools\Response\Token\CancelResponse;

class CancelRequest extends AbstractTokenRequest
{
    static $HTTP_REQUEST_METHOD = 'DELETE';

    public $reason;

    public $token;

    public function __construct($token, $reason)
    {
        $this->reason = $reason;
        $this->token = $token;
    }

    /**
     * @return array
     */
    public function buildRequestParams()
    {
        $this->requestArray['reason'] = $this->reason;
        return $this->requestArray;
    }

    public function buildEndpoint()
    {
        $this->endpoint = sprintf('%s/%s', $this->endpoint, $this->token);
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return \GuzzleHttp\Psr7\Response|void
     */
    public function buildResponse(Response $response)
    {
        $this->response = new CancelResponse($response);
    }
}
