<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a service message about a new forum topic created in the chat.
 */
class ForumTopicCreated implements TypeInterface
{
    /**
     * @param string      $name              Name of the topic
     * @param int         $iconColor         Color of the topic icon in RGB format
     * @param string|null $iconCustomEmojiId Optional. Unique identifier of the custom emoji shown as the topic icon
     */
    public function __construct(
        public string $name,
        public int $iconColor,
        public ?string $iconCustomEmojiId = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'name',
            'icon_color',
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
            name: $result['name'],
            iconColor: $result['icon_color'],
            iconCustomEmojiId: $result['icon_custom_emoji_id'] ?? null,
        );
    }
}
