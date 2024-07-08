<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains basic information about a refunded payment.
 */
class RefundedPayment implements TypeInterface
{
    /**
     * @param string      $currency                Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars. Currently, always “XTR”
     * @param int         $totalAmount             Total refunded price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45, total_amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     * @param string      $invoicePayload          Bot-specified invoice payload
     * @param string      $telegramPaymentChargeId Telegram payment identifier
     * @param string|null $providerPaymentChargeId Optional. Provider payment identifier
     */
    public function __construct(
        public string $currency,
        public int $totalAmount,
        public string $invoicePayload,
        public string $telegramPaymentChargeId,
        public ?string $providerPaymentChargeId = null,
    ) {
    }
}
