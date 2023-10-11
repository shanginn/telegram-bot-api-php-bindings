<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a portion of the price for goods or services.
 */
class LabeledPrice implements TypeInterface
{
    /**
     * @param string $label  Portion label
     * @param int    $amount Price of the product in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     */
    public function __construct(
        public string $label,
        public int $amount,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'label',
            'amount',
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
            label: $result['label'],
            amount: $result['amount'],
        );
    }
}
