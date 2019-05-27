<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Maslauskas\MoneyMatrixClient\SignatureGenerator;

class SignatureGeneratorTest extends TestCase
{
    /** @test */
    public function encode_signature()
    {
        $merchantId = "1008";
        $merchantKey = "066B1741D3D111E59E9846218491E2A3";

        $data = [
            'MerchantReference' => '3c05bea5191d4ff085216b100ca2183f',
            'PaymentMethod' => 'CreditCard',
            'CustomerId' => '1008~121223',
            'Amount' => '102.00',
            'Currency' => 'USD'
        ];

        $signature = new SignatureGenerator($merchantId, $merchantKey);
        $expected = "IOWi0IyH74nU7O0Da8WngNMXUviUcsi72AL19epTObl7dy6RX41e2KHBJC0LzmDAO8BENlJd1KYTQrwCS2ofpA==";

        self::assertTrue(hash_equals($expected, $signature->generate($data)), "Hashes are not equal!");
    }

    /** @test */
    public function validate_signature()
    {
        $merchantId = "1008";
        $merchantKey = "066B1741D3D111E59E9846218491E2A3";

        $data = [
            'MerchantReference' => '3c05bea5191d4ff085216b100ca2183f',
            'PaymentMethod' => 'CreditCard',
            'CustomerId' => '1008~121223',
            'Amount' => '102.00',
            'Currency' => 'USD'
        ];

        $generator = new SignatureGenerator($merchantId, $merchantKey);
        $signature = "IOWi0IyH74nU7O0Da8WngNMXUviUcsi72AL19epTObl7dy6RX41e2KHBJC0LzmDAO8BENlJd1KYTQrwCS2ofpA==";

        self::assertTrue($generator->validate($signature, $data));
    }
}