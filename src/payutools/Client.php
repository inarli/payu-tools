<?php
/**
 * PayU Client Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace PayuTools;

use GuzzleHttp\Client as HttpClient;
use PayuTools\Exceptions\PropertyExistException;
use PayuTools\Request\Request;
use PayuTools\Interfaces\RequestInterface;

class Client
{
    protected $merchant;
    private $client;

    public function __construct(Merchant $merchant)
    {
        $this->merchant = $merchant;
        $this->client = new HttpClient(['http_errors' => false]);
    }

    /**
     * @param \PayuTools\Interfaces\RequestInterface $request
     *
     * @return \PayuTools\Response\AbstractResponse
     * @throws \PayuTools\Exceptions\PropertyExistException
     */
    public function send(RequestInterface $request)
    {
        $requestMethod = strtolower($request->getRequestMethod());
        if (!method_exists($this, $requestMethod)) {
            throw new PropertyExistException("$requestMethod is not a valid request method", 500);
        }
        /** @var \GuzzleHttp\Psr7\Response $response */
        $response = $this->{$requestMethod}($request);
        $request->buildResponse($response);
        return $request->getResponse();
    }

    /**
     * @param \PayuTools\Interfaces\RequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(RequestInterface $request)
    {
        return $this->client->delete($request->getEndpoint(), ['query' => http_build_query($this->signature($request))]);
    }

    /**
     * @param \PayuTools\Interfaces\RequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(RequestInterface $request)
    {
        return $this->client->get($request->getEndpoint(), ['query' => http_build_query($this->signature($request))]);
    }

    /**
     * @param \PayuTools\Interfaces\RequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post(RequestInterface $request)
    {
        return $this->client->post($request->getEndpoint(), ['form_params' => http_build_query($this->signature($request))]);
    }

    /**
     *
     *
     * @param \PayuTools\Interfaces\RequestInterface $request
     *
     * @return string
     */
    private function signature(RequestInterface $request)
    {
        $requestParams = array_unique($request->buildRequestParams());
        $requestParams['merchant'] = $this->merchant->getMerchantCode();
        $requestParams['timestamp'] = time();
        ksort($requestParams);
        $hashString = '';
        foreach ($requestParams as $param) {
            $hashString .= $param;
        }
        $requestParams['signature'] = hash_hmac('SHA256', $hashString, $this->merchant->getSecretKey());
        return $requestParams;
    }
}
