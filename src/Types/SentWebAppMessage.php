<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * Describes an inline message sent by a Web App on behalf of a user.
 */
class SentWebAppMessage implements TypeInterface
{
    /**
     * @param string|null $inlineMessageId Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message.
     */
    public function __construct(
        public ?string $inlineMessageId = null,
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
            inlineMessageId: $result['inline_message_id'] ?? null,
        );
    }
}
