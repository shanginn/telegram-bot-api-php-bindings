<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about the quoted part of a message that is replied to by the given message.
 */
class TextQuote implements TypeInterface
{
    /**
     * @param string                    $text     Text of the quoted part of a message that is replied to by the given message
     * @param int                       $position Approximate quote position in the original message in UTF-16 code units as specified by the sender
     * @param array<MessageEntity>|null $entities Optional. Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are kept in quotes.
     * @param bool|null                 $isManual Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was added automatically by the server.
     */
    public function __construct(
        public string $text,
        public int $position,
        public ?array $entities = null,
        public ?bool $isManual = null,
    ) {
    }
}
