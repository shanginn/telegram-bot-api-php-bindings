<?php

namespace Shanginn\TelegramBotApiBindings\Types;

/**
 * This object contains information about one answer option in a poll.
 */
class PollOption implements TypeInterface
{
    /**
     * @param string                    $text         Option text, 1-100 characters
     * @param int                       $voterCount   Number of users that voted for this option
     * @param array<MessageEntity>|null $textEntities Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in poll option texts
     */
    public function __construct(
        public string $text,
        public int $voterCount,
        public ?array $textEntities = null,
    ) {
    }
}
