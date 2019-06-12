<?php

namespace Tests\Response;

use Maslauskas\MoneyMatrixClient\Request\RequestInterface;
use Maslauskas\MoneyMatrixClient\Response\DepositResponse;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use function GuzzleHttp\Psr7\parse_response;

class DepositResponseSuccessTest extends TestCase
{
    /**
     * @var RequestInterface|MockObject
     */
    private $request;
    /**
     * @var DepositResponse
     */
    private $response;

    /**
     * @test
     * @dataProvider getFieldsData
     *
     * @param string $getter
     * @param $value
     */
    public function it_should_get_values_from_data_via_getters(string $getter, $value)
    {
        $this->assertSame($value, $this->response->{$getter}());
    }

    public function getFieldsData()
    {
        return [
            'transaction code' => [
                "getTransactionCode",
                "aee933d28d0311e9b1c33a3031346235000006",
            ],
            'cashier url' => [
                "getCashierUrl",
                "https://cashier-stage.moneymatrix.com/Cashier/Deposit?nonce=af30ea908d0311e9b1c33a3031346235000006",
            ],
            'response message' => [
                "getResponseMessage",
                "Success",
            ],
            'signature' => [
                "getSignature",
                "lTS7HTv4dn8L0q8egN9mqW2cL760AMo/+TXuU9c3j0SJ6zczpyJ89H1lCQInrvPhXHrqCgeH/RAu9EuhE1VUvg==",
            ],
            'request id' => [
                "getRequestId",
                "9077c2d173f247cebfc6ef647fd96317",
            ],
        ];
    }

    /** @test */
    public function it_should_return_true_if_signature_is_valid()
    {
        $this->assertTrue($this->response->isValid());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $response = parse_response(file_get_contents(__DIR__ . '/../Mock/DepositRequestSuccess.txt'));
        $this->request = $this->createMock(RequestInterface::class);

        $this->response = new DepositResponse($this->request, $response->getBody()->getContents(), []);
    }
}
