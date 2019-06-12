<?php

namespace Maslauskas\MoneyMatrixClient\Client;

use GuzzleHttp\Psr7\Response;

interface ClientInterface
{
    /**
     * @param $method
     * @param $url
     * @param array $headers
     * @param array $data
     *
     * @return Response
     */
    public function request($method, $url, $headers = [], $data = []): Response;
}
