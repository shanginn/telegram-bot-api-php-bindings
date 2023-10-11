<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Represents a location to which a chat is connected.
 */
class ChatLocation implements TypeInterface
{
    /**
     * @param Location $location The location to which the supergroup is connected. Can't be a live location.
     * @param string   $address  Location address; 1-64 characters, as defined by the chat owner
     */
    public function __construct(
        public Location $location,
        public string $address,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'location',
            'address',
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
            location: \Shanginn\TelegramBotApiBindings\Types\Location::fromResponseResult($result['location']),
            address: $result['address'],
        );
    }
}
