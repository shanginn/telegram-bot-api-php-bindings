<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about an incoming shipping query.
 */
class ShippingQuery implements TypeInterface
{
    /**
     * @param string          $id              Unique query identifier
     * @param User            $from            User who sent the query
     * @param string          $invoicePayload  Bot specified invoice payload
     * @param ShippingAddress $shippingAddress User specified shipping address
     */
    public function __construct(
        public string $id,
        public User $from,
        public string $invoicePayload,
        public ShippingAddress $shippingAddress,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'id',
            'from',
            'invoice_payload',
            'shipping_address',
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
            id: $result['id'],
            from: \Shanginn\TelegramBotApiBindings\Types\User::fromResponseResult($result['from']),
            invoicePayload: $result['invoice_payload'],
            shippingAddress: \Shanginn\TelegramBotApiBindings\Types\ShippingAddress::fromResponseResult($result['shipping_address']),
        );
    }
}
