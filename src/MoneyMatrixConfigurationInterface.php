<?php

namespace Maslauskas\MoneyMatrixClient;

interface MoneyMatrixConfigurationInterface
{
    /**
     * The unique identifier of the merchant provided by MoneyMatrix.
     *
     * @return string
     */
    public function getMerchantId(): string;

    /**
     * The URL to which MoneyMatrix returns transaction success responses.
     * It must be a valid HTTP(S) address.
     *
     * @return string
     */
    public function getSuccessUrl(): string;

    /**
     * The URL to which MoneyMatrix returns failed transaction responses.
     * It must be a valid HTTP(S) address.
     *
     * @return string
     */
    public function getFailUrl(): string;

    /**
     * The URL to which MoneyMatrix returns server-to-server notifications
     * about transaction status changes (triggered by the Pending Notification status).
     * It must be a valid HTTP(S) address.
     *
     * @return string|null
     */
    public function getCallbackUrl(): ?string;

    /**
     * The URL to which MoneyMatrix returns canceled transaction responses.
     * It must be a valid HTTP(S) address.
     *
     * @return string
     */
    public function getCancelUrl(): string;
}
