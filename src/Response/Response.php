<?php

namespace Maslauskas\MoneyMatrix\Response;

use Maslauskas\MoneyMatrix\Request\RequestInterface;

class Response
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var string
     */
    protected $data;

    /**
     * @var array
     */
    protected $headers;

    /**
     * Response constructor.
     *
     * @param RequestInterface $request
     * @param string $data
     * @param array $headers
     */
    public function __construct(RequestInterface $request, string $data, array $headers = [])
    {
        $this->request = $request;
        $this->data = json_decode($data, true);
        $this->headers = $headers;
    }

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return $this->getResponseCode() >= 1 && $this->getResponseCode() <= 10;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return true;
    }

    /**
     * @return int
     */
    public function getResponseCode(): int
    {
        return $this->data['ResponseCode'];
    }


    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->data['RequestId'];
    }


    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->data['ResponseMessage'];
    }

    /**
     * @return string
     */
    public function getResponseDisplayText(): string
    {
        return $this->data['ResponseDisplayText'];
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->data['Signature'];
    }
}
