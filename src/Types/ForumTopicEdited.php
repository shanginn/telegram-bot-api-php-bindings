<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about an edited forum topic.
 */
class ForumTopicEdited implements TypeInterface
{
    /**
     * @param string|null $name              Optional. New name of the topic, if it was edited
     * @param string|null $iconCustomEmojiId Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
     */
    public function __construct(
        public ?string $name = null,
        public ?string $iconCustomEmojiId = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
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
            name: $result['name'] ?? null,
            iconCustomEmojiId: $result['icon_custom_emoji_id'] ?? null,
        );
    }
}
