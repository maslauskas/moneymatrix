<?php

namespace Maslauskas\MoneyMatrixClient\Client;

use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    /**
     * @param $method
     * @param $url
     * @param array $headers
     * @param array $data
     *
     * @return ResponseInterface
     */
    public function request($method, $url, $headers = [], $data = []): ResponseInterface;
}
