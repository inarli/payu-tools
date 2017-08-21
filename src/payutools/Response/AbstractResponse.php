<?php
/**
 * PayU Abstract Response Class
 *
 * @since     Aug 2017
 * @author    İlkay NARLI <ilkaynarli@gmail.com>
 */

namespace PayuTools\Response;

use GuzzleHttp\Psr7\Response;

abstract class AbstractResponse
{
    const SUCCESS_RESPONSE = 'success';
    const FAIL_RESPONSE = 'fail';
    protected $status;
    protected $error;
    protected $data;
    protected $errorCode;

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param mixed $errorCode
     */
    public function setErrorCode($errorCode)
    {
        $this->errorCode = $errorCode;
    }
    /**
     * @param \GuzzleHttp\Psr7\Response $response
     *
     * @return array|null
     */
    protected function decodeResponse(Response $response)
    {
        if ($response->getBody()->getSize() > 0) {
            return \GuzzleHttp\json_decode($response->getBody()->getContents(), true);
        }
        return null;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->error = $error;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}
