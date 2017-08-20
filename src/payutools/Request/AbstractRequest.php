<?php
/**
 * PayU Abstract Request Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */

namespace PayuTools\Request;

use GuzzleHttp\Psr7\Response;
use PayuTools\Interfaces\RequestInterface;

abstract class AbstractRequest implements RequestInterface
{
    protected $requestArray = [];

    protected $response;

    /**
     * @return string
     */
    public function getRequestMethod()
    {
        return static::$HTTP_REQUEST_METHOD;
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        $this->buildEndpoint();
        return $this->endpoint;
    }

    /**
     * @return string
     */
    public function buildEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @return \PayuTools\Response\AbstractResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return array
     */
    public function buildRequestParams()
    {
        return $this->requestArray;
    }

    public function buildResponse(Response $response)
    {
        return $response;
    }
}
