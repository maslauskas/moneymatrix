<?php

namespace Maslauskas\MoneyMatrixClient\Response;

use Maslauskas\MoneyMatrixClient\Request\RequestInterface;

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
        return true;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return true;
    }
}
