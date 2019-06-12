<?php

namespace Maslauskas\MoneyMatrixClient\Response;

class DepositResponse extends Response
{
    /**
     * @return string
     */
    public function getTransactionCode(): string
    {
        return $this->data['TransactionCode'];
    }

    /**
     * @return string
     */
    public function getCashierUrl(): string
    {
        return $this->data['CashierUrl'];
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->data['Signature'];
    }

    /**
     * @return string
     */
    public function getResponseMessage(): string
    {
        return $this->data['ResponseMessage'];
    }

    /**
     * @return string
     */
    public function getResponseDisplayText(): string
    {
        return $this->data['ResponseDisplayText'];
    }

    /**
     * @return int
     */
    public function getResponseCode(): int
    {
        return $this->data['ResponseCode'];
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->data['RequestId'];
    }
}
