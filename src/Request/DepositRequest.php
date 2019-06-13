<?php

namespace Maslauskas\MoneyMatrix\Request;

use Maslauskas\MoneyMatrix\Response\DepositResponse;
use Maslauskas\MoneyMatrix\Response\Response;

class DepositRequest extends AbstractRequest
{
    /**
     * @return string
     */
    public function getEndpoint(): string
    {
        return parent::getEndpoint() . '/InitDeposit';
    }

    /**
     * @param $data
     * @param array $headers
     *
     * @return DepositResponse
     */
    protected function createResponse($data, array $headers = []): Response
    {
        return new DepositResponse($this, $data, $headers);
    }
}
