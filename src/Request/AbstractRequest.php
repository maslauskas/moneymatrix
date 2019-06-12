<?php

namespace Maslauskas\MoneyMatrixClient\Request;

use Maslauskas\MoneyMatrixClient\Client\ClientInterface;
use Maslauskas\MoneyMatrixClient\Response\Response;

abstract class AbstractRequest implements RequestInterface
{
    /**
     * @var string
     */
    protected $endpoint = 'https://api.moneymatrix.com/api/v1/Hosted';

    /**
     * @var string
     */
    protected $stageEndpoint = 'https://api-stage.moneymatrix.com/api/v1/Hosted';

    /**
     * @var bool
     */
    protected $isLive = true;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var Response
     */
    private $response;

    /**
     * AbstractRequest constructor.
     *
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return bool
     */
    public function isLive(): bool
    {
        return $this->isLive;
    }

    /**
     * @param bool $isLive
     *
     * @return $this
     */
    public function setIsLive(bool $isLive)
    {
        $this->isLive = $isLive;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->isLive() ? $this->endpoint : $this->stageEndpoint;
    }

    /**
     * @return Response
     */
    public function send()
    {
        $data = $this->getData();

        return $this->sendData($data);
    }

    /**
     * Get HTTP Method.
     *
     * This is nearly always POST but can be over-ridden in sub classes.
     *
     * @return string
     */
    public function getHttpMethod()
    {
        return 'POST';
    }

    abstract protected function createResponse($data, array $headers = []): Response;

    /**
     * @param $data
     *
     * @return Response
     */
    protected function sendData($data)
    {
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $httpResponse = $this->httpClient->request($this->getHttpMethod(), $this->getEndpoint(), $headers, $data);

        return $this->response = $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());;
    }
}
