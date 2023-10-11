<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents information about an order.
 */
class OrderInfo implements TypeInterface
{
    /**
     * @param string|null          $name            Optional. User name
     * @param string|null          $phoneNumber     Optional. User's phone number
     * @param string|null          $email           Optional. User email
     * @param ShippingAddress|null $shippingAddress Optional. User shipping address
     */
    public function __construct(
        public ?string $name = null,
        public ?string $phoneNumber = null,
        public ?string $email = null,
        public ?ShippingAddress $shippingAddress = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
        ];

        $missingFields = [];

        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $missingFields[] = $field;
            }
        }

        if (count($missingFields) > 0) {
            throw new \InvalidArgumentException(sprintf('Class %s missing some fields from the result array: %s', static::class, implode(', ', $missingFields)));
        }

        return new self(
            name: $result['name'] ?? null,
            phoneNumber: $result['phone_number'] ?? null,
            email: $result['email'] ?? null,
            shippingAddress: $result['shipping_address'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\ShippingAddress::fromResponseResult($result['shipping_address'])
                : null,
        );
    }
}
