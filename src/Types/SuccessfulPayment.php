<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains basic information about a successful payment.
 */
class SuccessfulPayment implements TypeInterface
{
    /**
     * @param string         $currency                Three-letter ISO 4217 currency code
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

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'currency',
            'total_amount',
            'invoice_payload',
            'telegram_payment_charge_id',
            'provider_payment_charge_id',
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($result[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            currency: $result['currency'],
            totalAmount: $result['total_amount'],
            invoicePayload: $result['invoice_payload'],
            telegramPaymentChargeId: $result['telegram_payment_charge_id'],
            providerPaymentChargeId: $result['provider_payment_charge_id'],
            shippingOptionId: $result['shipping_option_id'] ?? null,
            orderInfo: ($result['order_info'] ?? null) !== null
                ? \Shanginn\TelegramBotApiBindings\Types\OrderInfo::fromResponseResult($result['order_info'])
                : null,
        );
    }
}
