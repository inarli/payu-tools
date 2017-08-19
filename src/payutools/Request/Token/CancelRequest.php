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
use PayuTools\Interfaces\RequestInterface;

class CancelRequest extends AbstractTokenRequest implements RequestInterface
{
    static $HTTP_REQUEST_METHOD = 'DELETE';

    protected $reason;

    public function __construct($token, $reason)
    {
        $this->setReason($reason);
        $this->setToken($token);
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return array
     */
    public function buildRequestParams()
    {
        $this->requestArray['reason'] = $this->getReason();
        return $this->requestArray;
    }

    public function buildEndpoint()
    {
        $this->endpoint = sprintf('%s/%s', $this->endpoint, $this->getToken());
    }

    /**
     * @param \GuzzleHttp\Psr7\Response $response
     */
    public function buildResponse(Response $response)
    {
        $this->response = new CancelResponse($response);
    }
}
