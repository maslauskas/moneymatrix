<?php

namespace Maslauskas\MoneyMatrixClient;

class PaymentManager
{
    /**
     * @var MoneyMatrixConfigurationInterface
     */
    private $configuration;
    /**
     * @var SignatureGenerator
     */
    private $signatureGenerator;

    public function __construct(MoneyMatrixConfigurationInterface $configuration, SignatureGenerator $signatureGenerator)
    {
        $this->configuration = $configuration;
        $this->signatureGenerator = $signatureGenerator;
    }

    public function initDeposit(DepositInputInterface $input)
    {
        $signature = $this->signatureGenerator->generate([
            'MerchantReference' => $input->getMerchantReference(),
            'PaymentMethod' => $input->getPaymentMethod(),
            'CustomerId' => $input->getCustomerId(),
            'Amount' => $input->getAmount(),
            'Currency' => $input->getCurrency(),
        ]);

        $requestData = [
            'CustomerId' => $input->getCustomerId(),
            'CustomerGroups' => $input->getCustomerGroups(),
            'MerchantReference' => $input->getMerchantReference(),
            'Channel' => $input->getChannel(),
            'FirstName' => $input->getFirstName(),
            'LastName' => $input->getLastName(),
            'EmailAddress' => $input->getEmailAddress(),
            'BirthDate' => $input->getBirthDate(),
            'PaymentMethod' => $input->getPaymentMethod(),
            'Amount' => $input->getAmount(),
            'Currency' => $input->getCurrency(),
            'CountryCode' => $input->getCountryCode(),
            'IpAddress' => $input->getIpAddress(),
            'RegistrationIpAddress' => $input->getRegistrationIpAddress(),
            'RegistrationDate' => $input->getRegistrationDate(),
            'Address' => $input->getAddress(),
            'City' => $input->getCity(),
            'State' => $input->getState(),
            'PhoneNumber' => $input->getPhoneNumber(),
            'PostalCode' => $input->getPostalCode(),
            'SuccessUrl' => $this->configuration->getSuccessUrl(),
            'FailUrl' => $this->configuration->getFailUrl(),
            'CallbackUrl' => $this->configuration->getCallbackUrl(),
            'CancelUrl' => $this->configuration->getCancelUrl(),
            'AllowPaySolChange' => $input->getAllowPaySolChange(),
            'MerchantId' => $this->configuration->getMerchantId(),
            'Signature' => $signature,
            'Language' => $input->getLanguage(),
        ];
    }
}
