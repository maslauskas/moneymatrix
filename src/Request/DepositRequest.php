<?php

namespace Maslauskas\MoneyMatrixClient\Request;

use Maslauskas\MoneyMatrixClient\Response\DepositResponse;
use Maslauskas\MoneyMatrixClient\Response\Response;

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
