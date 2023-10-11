<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes a Web App.
 */
class WebAppInfo implements TypeInterface
{
    /**
     * @param string $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
     */
    public function __construct(
        public string $url,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'url',
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
            url: $result['url'],
        );
    }
}
