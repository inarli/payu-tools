<?php
/**
 * PayU Abstract Token Request Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace PayuTools\Request\Token;

use PayuTools\Interfaces\RequestInterface;

abstract class AbstractTokenRequest implements RequestInterface
{
    protected $endpoint = 'https://secure.payu.com.tr/order/token/v2/merchantToken';

    protected $requestArray = [];

    protected $response;

    protected $token;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

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
}
