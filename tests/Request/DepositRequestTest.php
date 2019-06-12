<?php

namespace Tests\Request;

use function GuzzleHttp\Psr7\parse_response;
use Maslauskas\MoneyMatrixClient\Client\ClientInterface;
use Maslauskas\MoneyMatrixClient\Request\DepositRequest;
use Maslauskas\MoneyMatrixClient\Response\DepositResponse;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DepositRequestTest extends TestCase
{
    /**
     * @var DepositRequest|MockObject
     */
    private $request;
    /**
     * @var ClientInterface|MockObject
     */
    private $httpClient;

    protected function setUp(): void
    {
        parent::setUp();

        $this->httpClient = $this->createMock(ClientInterface::class);
        $this->request = new DepositRequest($this->httpClient);
    }

    /**
     * @dataProvider getEndpointDataProvider
     *
     * @param string $expected
     * @param bool $isLive
     */
    public function testGenerateEndpoint(string $expected, bool $isLive)
    {
        $this->request->setIsLive($isLive);

        $this->assertSame(
            $expected,
            $this->request->getEndpoint()
        );
    }

    public function getEndpointDataProvider(): array
    {
        return [
            'production' => ['https://api.moneymatrix.com/api/v1/Hosted/InitDeposit', true],
            'stage' => ['https://api-stage.moneymatrix.com/api/v1/Hosted/InitDeposit', false],
        ];
    }

    public function testSendSuccess()
    {
        $response = parse_response(file_get_contents(__DIR__ . '/../Mock/DepositRequestSuccess.txt'));
        $this->httpClient->method('request')->willReturn($response);

        /** @var DepositResponse $response */
        $response = $this->request->send();

        $this->assertTrue($response->isSuccessful());
        $this->assertTrue($response->isValid());
        $this->assertSame("https://cashier-stage.moneymatrix.com/Cashier/Deposit?nonce=af30ea908d0311e9b1c33a3031346235000006", $response->getCashierUrl());
    }
}
