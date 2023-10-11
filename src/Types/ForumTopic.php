<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a forum topic.
 */
class ForumTopic implements TypeInterface
{
    /**
     * @param int         $messageThreadId   Unique identifier of the forum topic
     * @param string      $name              Name of the topic
     * @param int         $iconColor         Color of the topic icon in RGB format
     * @param string|null $iconCustomEmojiId Optional. Unique identifier of the custom emoji shown as the topic icon
     */
    public function __construct(
        public int $messageThreadId,
        public string $name,
        public int $iconColor,
        public ?string $iconCustomEmojiId = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'message_thread_id',
            'name',
            'icon_color',
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
            messageThreadId: $result['message_thread_id'],
            name: $result['name'],
            iconColor: $result['icon_color'],
            iconCustomEmojiId: $result['icon_custom_emoji_id'] ?? null,
        );
    }
}
