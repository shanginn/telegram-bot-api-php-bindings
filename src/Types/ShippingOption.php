<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents one shipping option.
 */
class ShippingOption implements TypeInterface
{
    /**
     * @param string              $id     Shipping option identifier
     * @param string              $title  Option title
     * @param array<LabeledPrice> $prices List of price portions
     */
    public function __construct(
        public string $id,
        public string $title,
        public array $prices,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'id',
            'title',
            'prices',
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
            title: $result['title'],
            prices: $result['prices'],
        );
    }
}
