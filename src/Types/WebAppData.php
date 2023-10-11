<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes data sent from a Web App to the bot.
 */
class WebAppData implements TypeInterface
{
    /**
     * @param string $data       The data. Be aware that a bad client can send arbitrary data in this field.
     * @param string $buttonText Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary data in this field.
     */
    public function __construct(
        public string $data,
        public string $buttonText,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'data',
            'button_text',
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
            data: $result['data'],
            buttonText: $result['button_text'],
        );
    }
}
