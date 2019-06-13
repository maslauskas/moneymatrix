<?php

namespace Tests\Response;

use function GuzzleHttp\Psr7\parse_response;
use Maslauskas\MoneyMatrix\Request\RequestInterface;
use Maslauskas\MoneyMatrix\Response\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ChecksumInvalidResponseTest extends TestCase
{
    /**
     * @var RequestInterface|MockObject
     */
    private $request;
    /**
     * @var Response
     */
    private $response;

    protected function setUp(): void
    {
        parent::setUp();

        $response = parse_response(file_get_contents(__DIR__ . '/../Mock/ChecksumInvalidResponse.txt'));
        $this->request = $this->createMock(RequestInterface::class);

        $this->response = new Response($this->request, $response->getBody()->getContents(), []);
    }

    /** @test */
    public function it_should_return_unsuccessful_status_code()
    {
        $this->assertFalse($this->response->isSuccessful());
    }
}
