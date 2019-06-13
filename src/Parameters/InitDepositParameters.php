<?php

namespace Maslauskas\MoneyMatrix\Parameters;

class InitDepositParameters extends AbstractParameterBag
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return array_intersect_key($this->all(), array_flip([
            'CustomerId',
            'CustomerGroups',
            'MerchantReference',
            'Channel',
            'FirstName',
            'LastName',
            'EmailAddress',
            'BirthDate',
            'PaymentMethod',
            'Amount',
            'Currency',
            'CountryCode',
            'IpAddress',
            'RegistrationIpAddress',
            'RegistrationDate',
            'Address',
            'City',
            'State',
            'PhoneNumber',
            'PostalCode',
            'SuccessUrl',
            'FailUrl',
            'CallbackUrl',
            'CancelUrl',
            'AllowPaySolChange',
            'MerchantId',
            'Language',
        ]));
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
