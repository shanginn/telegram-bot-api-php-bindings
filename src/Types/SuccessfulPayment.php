<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains basic information about a successful payment.
 */
class SuccessfulPayment implements TypeInterface
{
    /**
     * @param string         $currency                Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int            $totalAmount             Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     * @param string         $invoicePayload          Bot specified invoice payload
     * @param string         $telegramPaymentChargeId Telegram payment identifier
     * @param string         $providerPaymentChargeId Provider payment identifier
     * @param string|null    $shippingOptionId        Optional. Identifier of the shipping option chosen by the user
     * @param OrderInfo|null $orderInfo               Optional. Order information provided by the user
     */
    public function __construct(
        public string $currency,
        public int $totalAmount,
        public string $invoicePayload,
        public string $telegramPaymentChargeId,
        public string $providerPaymentChargeId,
        public ?string $shippingOptionId = null,
        public ?OrderInfo $orderInfo = null,
    ) {
    }
}
