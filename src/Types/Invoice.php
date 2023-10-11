<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains basic information about an invoice.
 */
class Invoice implements TypeInterface
{
    /**
     * @param string $title          Product name
     * @param string $description    Product description
     * @param string $startParameter Unique bot deep-linking parameter that can be used to generate this invoice
     * @param string $currency       Three-letter ISO 4217 currency code
     * @param int    $totalAmount    Total price in the smallest units of the currency (integer, not float/double). For example, for a price of US$ 1.45 pass amount = 145. See the exp parameter in currencies.json, it shows the number of digits past the decimal point for each currency (2 for the majority of currencies).
     */
    public function __construct(
        public string $title,
        public string $description,
        public string $startParameter,
        public string $currency,
        public int $totalAmount,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'title',
            'description',
            'start_parameter',
            'currency',
            'total_amount',
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
            title: $result['title'],
            description: $result['description'],
            startParameter: $result['start_parameter'],
            currency: $result['currency'],
            totalAmount: $result['total_amount'],
        );
    }
}
