<?php

namespace Maslauskas\MoneyMatrixClient\Request;

use Maslauskas\MoneyMatrixClient\Client\ClientInterface;
use Maslauskas\MoneyMatrixClient\Parameters\AbstractParameterBag;
use Maslauskas\MoneyMatrixClient\Response\Response;
use Maslauskas\MoneyMatrixClient\SignatureGenerator;
use Symfony\Component\HttpFoundation\ParameterBag;

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
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var Response
     */
    private $response;

    /**
     * @var ParameterBag
     */
    private $parameters;
    /**
     * @var SignatureGenerator
     */
    private $signatureGenerator;

    /**
     * AbstractRequest constructor.
     *
     * @param ClientInterface $httpClient
     * @param SignatureGenerator $signatureGenerator
     * @param AbstractParameterBag $parameters
     */
    public function __construct(
        ClientInterface $httpClient,
        SignatureGenerator $signatureGenerator,
        AbstractParameterBag $parameters
    )
    {
        $this->httpClient = $httpClient;
        $this->parameters = $parameters;
        $this->signatureGenerator = $signatureGenerator;
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
        $data = $this->getRequestParameters();

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

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function getParameter(string $key)
    {
        return $this->parameters->get($key);
    }

    /**
     * @param $data
     * @param array $headers
     *
     * @return Response
     */
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

        return $this->response = $this->createResponse($httpResponse->getBody()->getContents(), $httpResponse->getHeaders());
    }

    /**
     * @return array
     */
    private function getRequestParameters()
    {
        return array_merge(
            $this->parameters->toArray(),
            ['Signature' => $this->signatureGenerator->generate($this->parameters->getSignatureParams())]
        );
    }
}
