<?php

namespace Maslauskas\MoneyMatrix\Client;

use Psr\Http\Message\ResponseInterface;

class HttpClient implements ClientInterface
{
    /**
     * @var \GuzzleHttp\ClientInterface
     */
    private $client;

    /**
     * HttpClient constructor.
     *
     * @param \GuzzleHttp\ClientInterface $client
     */
    public function __construct(\GuzzleHttp\ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param $method
     * @param $url
     * @param array $headers
     * @param array $data
     *
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $url, $headers = [], $data = []): ResponseInterface
    {
        return $this->client->request($method, $url, [
            'headers' => $headers,
            'body' => $data,
        ]);
    }
}
