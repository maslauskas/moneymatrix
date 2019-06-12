<?php

namespace Maslauskas\MoneyMatrixClient\Parameters;

class InitDepositParameters extends AbstractParameterBag
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        // TODO: Implement toArray() method.
        return [];
    }

    /**
     * @return array
     */
    public function getSignatureParams(): array
    {
        return [
            'MerchantReference' => $this->get('MerchantReference'),
            'PaymentMethod' => $this->get('PaymentMethod'),
            'CustomerId' => $this->get('CustomerId'),
            'Amount' => $this->get('Amount'),
            'Currency' => $this->get('Currency'),
        ];
    }
}
