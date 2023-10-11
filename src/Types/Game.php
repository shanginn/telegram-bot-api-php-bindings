<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
 */
class Game implements TypeInterface
{
    /**
     * @param string                    $title        Title of the game
     * @param string                    $description  Description of the game
     * @param array<PhotoSize>          $photo        photo that will be displayed in the game message in chats
     * @param string|null               $text         Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
     * @param array<MessageEntity>|null $textEntities Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     * @param Animation|null            $animation    Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
     */
    public function __construct(
        public string $title,
        public string $description,
        public array $photo,
        public ?string $text = null,
        public ?array $textEntities = null,
        public ?Animation $animation = null,
    ) {
    }

    public static function fromResponseResult(array $result): self
    {
        $requiredFields = [
            'title',
            'description',
            'photo',
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
            photo: $result['photo'],
            text: $result['text'] ?? null,
            textEntities: $result['text_entities'] ?? null,
            animation: $result['animation'] !== null
                ? \Shanginn\TelegramBotApiBindings\Types\Animation::fromResponseResult($result['animation'])
                : null,
        );
    }
}
