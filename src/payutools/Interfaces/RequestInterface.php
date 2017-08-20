<?php
/**
 * PayU Request Interface
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */
namespace PayuTools\Interfaces;

use GuzzleHttp\Psr7\Response;
use PayuTools\Merchant;

interface RequestInterface
{
    public function buildRequestParams();
    public function buildEndpoint();
    public function buildResponse(Response $response);
    public function getResponse();
    public function getRequestMethod();
    public function getEndpoint();
    public function signature(Merchant $merchant);
}
