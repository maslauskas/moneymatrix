<?php

namespace Maslauskas\MoneyMatrixClient;

use Maslauskas\MoneyMatrixClient\Client\ClientInterface;
use Maslauskas\MoneyMatrixClient\Parameters\InitDepositParameters;
use Maslauskas\MoneyMatrixClient\Request\DepositRequest;

class Gateway
{
    /**
     * @var ClientInterface
     */
    private $httpClient;
    /**
     * @var SignatureGenerator
     */
    private $signatureGenerator;

    /**
     * Gateway constructor.
     *
     * @param ClientInterface $httpClient
     * @param SignatureGenerator $signatureGenerator
     */
    public function __construct(
        ClientInterface $httpClient,
        SignatureGenerator $signatureGenerator
    )
    {
        $this->httpClient = $httpClient;
        $this->signatureGenerator = $signatureGenerator;
    }

    /**
     * @param array $params
     *
     * @return DepositRequest
     */
    public function initDeposit(array $params)
    {
        $request = new DepositRequest($this->httpClient, $this->signatureGenerator, new InitDepositParameters($params));

        return $request;
    }
}
