<?php

namespace Tests;

use Maslauskas\MoneyMatrixClient\Client\ClientInterface;
use Maslauskas\MoneyMatrixClient\Gateway;
use Maslauskas\MoneyMatrixClient\Request\DepositRequest;
use Maslauskas\MoneyMatrixClient\SignatureGenerator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GatewayTest extends TestCase
{
    /**
     * @var Gateway
     */
    private $gateway;
    /**
     * @var ClientInterface|MockObject
     */
    private $httpClient;
    /**
     * @var SignatureGenerator|MockObject
     */
    private $signatureGenerator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->httpClient = $this->createMock(ClientInterface::class);
        $this->signatureGenerator = $this->createMock(SignatureGenerator::class);

        $this->gateway = new Gateway($this->httpClient, $this->signatureGenerator);
    }

    public function testInitDeposit()
    {
        $request = $this->gateway->initDeposit([
            'RegistrationIpAddress' => '127.0.0.1',
        ]);

        $this->assertInstanceOf(DepositRequest::class, $request);
        $this->assertSame("127.0.0.1", $request->getParameter('RegistrationIpAddress'));
    }
}
