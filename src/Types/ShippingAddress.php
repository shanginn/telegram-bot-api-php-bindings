<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a shipping address.
 */
class ShippingAddress implements TypeInterface
{
    /**
     * @param string $countryCode Two-letter ISO 3166-1 alpha-2 country code
     * @param string $state       State, if applicable
     * @param string $city        City
     * @param string $streetLine1 First line for the address
     * @param string $streetLine2 Second line for the address
     * @param string $postCode    Address post code
     */
    public function __construct(
        public string $countryCode,
        public string $state,
        public string $city,
        public string $streetLine1,
        public string $streetLine2,
        public string $postCode,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'country_code',
            'state',
            'city',
            'street_line1',
            'street_line2',
            'post_code',
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
            countryCode: $result['country_code'],
            state: $result['state'],
            city: $result['city'],
            streetLine1: $result['street_line1'],
            streetLine2: $result['street_line2'],
            postCode: $result['post_code'],
        );
    }
}
