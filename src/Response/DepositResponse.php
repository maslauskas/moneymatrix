<?php

namespace Maslauskas\MoneyMatrixClient\Response;

class DepositResponse extends Response
{
    /**
     * @return string
     */
    public function getTransactionCode(): string
    {
        return $this->data['TransactionCode'] ?? null;
    }

    /**
     * @return string
     */
    public function getCashierUrl(): string
    {
        return $this->data['CashierUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function getChecksum(): string
    {
        return $this->data['Checksum'] ?? null;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->data['Signature'] ?? null;
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->data['ResponseMessage'] ?? null;
    }

    /**
     * @return string
     */
    public function getResponseDisplayText(): string
    {
        return $this->data['ResponseDisplayText'] ?? null;
    }

    /**
     * @return int
     */
    public function getResponseCode(): int
    {
        return $this->data['ResponseCode'] ?? null;
    }
}
