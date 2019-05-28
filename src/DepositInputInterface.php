<?php

namespace Maslauskas\MoneyMatrixClient;

interface DepositInputInterface
{
    /**
     * The identifier of the user in the merchant's application
     *
     * @return string
     */
    public function getCustomerId(): string;

    /**
     * The group to which the user belongs in the merchant's application
     *
     * @return string
     */
    public function getCustomerGroups(): string;

    /**
     * The reference of the transaction in the merchant's application
     *
     * @return string
     */
    public function getMerchantReference(): string;

    /**
     * The channel from which the user performs the deposit
     * Possible values: Desktop, Mobile
     *
     * @return string
     */
    public function getChannel(): string;

    /**
     * The first name of the user
     *
     * @return string
     */
    public function getFirstName(): string;

    /**
     * The last name of the user
     *
     * @return string
     */
    public function getLastName(): string;

    /**
     * The e-mail address of the user.
     * It must be a valid e-mail address.
     *
     * @return string
     */
    public function getEmailAddress(): string;

    /**
     * The birth date of the user. The date format must be MM/DD/YYYY.
     *
     * @return string
     */
    public function getBirthDate(): string;

    /**
     * Notice: To get fully listed cashier, pass this parameter as empty.
     *
     * @return string
     */
    public function getPaymentMethod(): string;

    /**
     * The amount of the transaction. Must be decimal
     *
     * @return string
     */
    public function getAmount(): string;

    /**
     * The currency of the transaction.
     * For a complete list of supported currencies, please refer to ISO Currency Codes.
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * The country code of the user.
     * For a complete list of supported countries, please refer to ISO Country Codes.
     *
     * @return string
     */
    public function getCountryCode(): string;

    /**
     * The IP address of the customer's device connected to the merchant's application.
     * Notice: IP v4 format supported only.
     *
     * @return string
     */
    public function getIpAddress(): string;

    /**
     * The IP address from which the user registered his account in the merchant's platform.
     * Notice: IP v4 format supported only.
     *
     * @return string
     */
    public function getRegistrationIpAddress(): string;

    /**
     * The date on which the user registered his account in the merchant's application.
     *
     * @return string
     */
    public function getRegistrationDate(): string;

    /**
     * The physical address of the user (street, building, apartment).
     *
     * @return string
     */
    public function getAddress(): string;

    /**
     * The city of the user.
     *
     * @return string
     */
    public function getCity(): string;

    /**
     * The state of the user.
     *
     * @return string
     */
    public function getState(): string;

    /**
     * The phone number of the user.
     *
     * @return string
     */
    public function getPhoneNumber(): string;

    /**
     * The postal code of the user.
     *
     * @return string
     */
    public function getPostalCode(): string;

    /**
     * Notice: To get fully listed cashier, pass this parameter as “true”.
     *
     * Note: You need to set AllowPaySolChange = true.
     * So, you need to have one of the following:
     * - AllowPaySolChange = true AND PaymentMethod empty
     * - AllowPaySolChange = true AND PaymentMethod
     * - AllowPaySolChange = false AND PaymentMethod
     *
     * @return bool|null
     */
    public function getAllowPaySolChange(): ?bool;

    /**
     * The ISO 639-1 code of the language.
     *
     * @return string|null
     */
    public function getLanguage(): ?string;
}
